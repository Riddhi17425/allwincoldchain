<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class EnquiryController extends Controller
{
    public function store(Request $request)
    {
        $successMessage = 'Your enquiry has been received successfully.';

        // Honeypot spam check — real users never fill this hidden field
        if ($request->filled('website_url')) {
            Log::info('Enquiry skipped: honeypot filled', ['ip' => $request->ip()]);
            return $this->respond($request, $successMessage);
        }

        $data = $request->validate([
            'name'    => 'required|string|max:255',
            'phone'   => 'required|string|max:20',
            'email'   => 'required|email|max:255',
            'details' => 'nullable|string',
            'company' => 'nullable|string|max:255',
            'product' => 'nullable|string|max:255',
            'temp'    => 'nullable|string|max:255',
        ]);

        // 1. Save to Database
        try {
            Enquiry::create([
                'name'        => $data['name'],
                'phone'       => $data['phone'],
                'email'       => $data['email'],
                'details'     => $data['details'] ?? null,
                'company'     => $data['company'] ?? null,
                'product'     => $data['product'] ?? null,
                'temperature' => $data['temp'] ?? null,
            ]);
        } catch (\Throwable $e) {
            // Real reason is written to storage/logs/laravel.log
            Log::error('Enquiry save failed: ' . $e->getMessage());

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Sorry, something went wrong. Please try again.',
                ], 500);
            }
            return back()->withInput()->withErrors(['server' => 'Sorry, something went wrong. Please try again.']);
        }

        // 2. Send to Google Sheet (failure must never block the user)
        $payload = [
            'inquiry_type' => !empty($data['product']) ? 'PPC Inquiry' : 'Enquiry Form',
            'name'         => $data['name'],
            'company'      => $data['company'] ?? '',
            'phone'        => $data['phone'],
            'email'        => $data['email'],
            'product'      => $data['product'] ?? '',
            'temperature'  => $data['temp'] ?? '',
            'message'      => $data['details'] ?? '',
            'date'      => now()->format('Y-m-d H:i:s'),
        ];

        try {
            Http::timeout(10)->post('https://script.google.com/macros/s/AKfycbwwru4McNS1pez-Bquj-5qyIM5z1RiuGMtQ_jjQKdeIT32oXr42eM9dYG9ZWy32jE1_/exec', $payload);
        } catch (\Throwable $e) {
            Log::warning('Enquiry Google Sheet failed: ' . $e->getMessage());
        }

        // 3. Respond (JSON for AJAX, redirect for normal form post)
        return $this->respond($request, $successMessage);
    }

    private function respond(Request $request, string $message)
    {
        if ($request->expectsJson()) {
            return response()->json([
                'success'  => true,
                'message'  => $message,
                'redirect' => route('thankyou'),   // your existing route name
            ]);
        }

        return redirect()->route('thankyou')->with('success', $message);
    }
}