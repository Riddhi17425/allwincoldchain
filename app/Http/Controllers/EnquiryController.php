<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Enquiry;

class EnquiryController extends Controller
{
    public function store(Request $request)
    {
        // Honeypot spam check — real users never fill this hidden field
        if ($request->filled('website_url')) {
            return response()->json([
                'success' => true,
                'message' => 'Your enquiry has been received successfully.',
            ]);
        }

        $request->validate([
            'name'    => 'required|string|max:255',
            'phone'   => 'required|string|max:20',
            'email'   => 'required|email',
            'details' => 'nullable|string',
        ]);

        // 1. Save to Database
        $enquiry = Enquiry::create([
            'name'    => $request->name,
            'phone'   => $request->phone,
            'email'   => $request->email,
            'details' => $request->details,
        ]);

        // 2. Send to Google Sheet (SAME sheet/webhook as the Contact Us form,
        //    differentiated by the "inquiry_type" field so it lands in the
        //    same tab with a column that shows which form it came from)
        $payload = [
            'inquiry_type' => 'Enquiry Form',
            'name'         => $request->name,
            'phone'        => $request->phone,
            'email'        => $request->email,
            'message'      => $request->details,
        ];

        try {
            Http::post('https://script.google.com/macros/s/AKfycbyNYd2FAH4aGfLjZs-EHL0T9T0CYwgb1sADD7efuiaQSh81DleLJAU2h9ZdDmSIRz1C7w/exec', $payload);
        } catch (\Exception $e) {
            // Sheet fail ho toh bhi user ko error na aaye, DB me record safe hai
        }

        // 3. Return JSON (form is submitted via AJAX/fetch)
        return response()->json([
            'success' => true,
            'message' => 'Your enquiry has been received successfully.',
        ]);
    }
}