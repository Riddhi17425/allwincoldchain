<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\WhatsappInquiry;

class WhatsappController extends Controller
{
public function store(Request $request)
{
    $request->validate([
        'phone'   => 'required', 
        'message' => 'nullable|string',
    ]);

    // 1. Save to Database
    $inquiry = WhatsappInquiry::create([
        'phone'   => $request->phone,
        'message' => $request->message,
    ]);

    // 2. Send to Google Sheet
    $payload = [
        'form_type' => 'whatsapp inquiry',
        'contact'   => $request->phone,
        'message'   => $request->message,
        'date'      => now()->format('Y-m-d H:i:s'),
    ];

    try {
        Http::post('https://script.google.com/macros/s/AKfycbzY8bSiXB6PuPgCjy4PXhSdWRk7ntuQvnJHtKWG25edOBmuWtG9EKguLmNpDVJ99mw91A/exec', $payload);
    } catch (\Exception $e) {
        // Sheet fail ho toh bhi error na aaye
    }

    // 3. Return JSON instead of Redirect
    return response()->json([
        'success' => true,
        'url' => "https://api.whatsapp.com/send/?phone=919687640805&text=" . urlencode($request->message ?: "Hello, I am contacting from your website")
    ]);
}
}