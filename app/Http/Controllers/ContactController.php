<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Exception;

class ContactController extends Controller
{
    public function contact()
    {
        $metatitle = "Contact Us – Cold Chain Logistics Solutions";
        $metadescription = "Contact Allwin for reliable cold chain logistics and temperature-controlled solutions. We’re ready to understand your needs and assist you today.";
        return view('front.contact-us',compact('metatitle', 'metadescription'));
    }
   
   //14-02-2026 
    // public function contactStore(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'phone' => 'required|numeric',
    //         'email' => 'required|email|max:255',
    //         'g-recaptcha-response' => 'required', // Validate presence
    //     ]);
    
    //     // Validate Google reCAPTCHA response with Google API
    //     $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
    //         'secret' => '6Lf2ZCkrAAAAAEQ6Xf1dU5xgidUua0CwYY0YM9DR', // Replace with your reCAPTCHA secret key
    //         'response' => $request->input('g-recaptcha-response'),
    //         'remoteip' => $request->ip(),
    //     ]);
    
    //     $captchaResult = $response->json();
    //     if (!$captchaResult['success']) {
    //         return back()->with('error', 'reCAPTCHA verification failed. Please try again.');
    //     }
    
    //     // Server-side spam email pattern check
    //     $email = $request->email;
    //     $spamPatterns = [
    //         '/^[a-zA-Z]{8,}[0-9]{3,}@/',
    //         '/^[0-9]+@/',
    //         '/(temp-mail|10minutemail|mailinator|guerrillamail|yopmail|yahoo.com|throwawaymail)/i',
    //         '/^(test|demo|example|noreply|fake|admin|info|random|dummy)/i',
    //         '/^(.)(\1){5,}@/',
    //         '/^(0123456789|9876543210|1234567890|0987654321)@/',
    //         '/^(.)(.)(.)(.)(.).?\5\4\3\2\1@/',
    //         '/^[bcdfghjklmnpqrstvwxyz]{8,}@/',
    //         '/^[aeiou]{5,}@/',
    //         '/^([a-z]{8,})[0-9]+@/',
    //         '/^[a-zA-Z0-9._%+-]{30,}@/'
    //     ];
    
    //     foreach ($spamPatterns as $pattern) {
    //         if (preg_match($pattern, $email)) {
    //             return back()->with('error', 'Invalid or spammy email detected.');
    //         }
    //     }
    
    //     // If passed all checks, proceed
    //     $contact = new Contact();
    //     $contact->name = $request->name;
    //     $contact->phone = $request->phone;
    //     $contact->email = $request->email;
    //     $contact->details = $request->details;
    //     $contact->save();
    
    //     $emailData = [
    //         'name' => $contact->name,
    //         'phone' => $contact->phone,
    //         'email' => $contact->email,
    //         'message' => $contact->details,
    //     ];
    
    //     try {
    //         Mail::send('mail.thankyou', $emailData, function ($message) use ($emailData) {
    //             $message->to($emailData['email'])->subject('Thank You!');
    //         });
    
    //         Mail::send('mail.inquirydata', ['data' => $emailData], function ($message) {
    //             $message->to('allwincoldchainsolutions@gmail.com')->subject('New Inquiry For Contact');
    //         });
    //     } catch (Exception $e) {
    //         Log::error('Mail send failed: ' . $e->getMessage());
    //     }
    
    //     return redirect()->route('thankyou')->with('success', 'Inquiry submitted successfully!');
    // }
    //end14-02-2026
    
    public function contactStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric',
            'email' => 'required|email|max:255',
            'g-recaptcha-response' => 'required',
        ]);

        // ✅ Google reCAPTCHA verify
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => env('RECAPTCHA_SECRET', '6Lf2ZCkrAAAAAEQ6Xf1dU5xgidUua0CwYY0YM9DR'),
            'response' => $request->input('g-recaptcha-response'),
            'remoteip' => $request->ip(),
        ]);

        $captchaResult = $response->json();
        if (!isset($captchaResult['success']) || !$captchaResult['success']) {
            return back()->with('error', 'reCAPTCHA verification failed. Please try again.');
        }

        // ✅ Spam email pattern check
        $email = $request->email;
        $spamPatterns = [
            '/^[a-zA-Z]{8,}[0-9]{3,}@/',
            '/^[0-9]+@/',
            '/(temp-mail|10minutemail|mailinator|guerrillamail|yopmail|throwawaymail)/i',
            '/^(test|demo|example|noreply|fake|admin|info|random|dummy)/i',
            '/^(.)(\1){5,}@/',
            '/^(0123456789|9876543210|1234567890|0987654321)@/',
            '/^[a-zA-Z0-9._%+-]{30,}@/'
        ];

        foreach ($spamPatterns as $pattern) {
            if (preg_match($pattern, $email)) {
                return back()->with('error', 'Invalid or spammy email detected.');
            }
        }

        // ✅ Save to DB (NO model change)
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->phone = $request->phone;
        $contact->email = $request->email;
        $contact->details = $request->details;
        $contact->save();

        $emailData = [
            'name' => $contact->name,
            'phone' => $contact->phone,
            'email' => $contact->email,
            'message' => $contact->details,
        ];

        // ✅ Save to Google Sheet
        try {
            Http::post('https://script.google.com/macros/s/AKfycbz3UAP4Nfq20XQmo4mnQQkD552SN-woe55XsmaK4aFrrFbFm_eV_elwtToSiJmDvFxt/exec', [
                'name' => $contact->name,
                'phone' => $contact->phone,
                'email' => $contact->email,
                'message' => $contact->details,
            ]);
        } catch (\Exception $e) {
            Log::error("Google Sheet Error: " . $e->getMessage());
        }

        // ✅ Send Emails
        try {
            Mail::send('mail.thankyou', $emailData, function ($message) use ($emailData) {
                $message->to($emailData['email'])->subject('Thank You!');
            });

            Mail::send('mail.inquirydata', ['data' => $emailData], function ($message) {
                $message->to('allwincoldchainsolutions@gmail.com')->subject('New Inquiry For Contact');
            });
        } catch (\Exception $e) {
            Log::error('Mail send failed: ' . $e->getMessage());
        }

        return redirect()->route('thankyou')->with('success', 'Inquiry submitted successfully!');
    }

        
    public function thankyou()
    {   
        // $data['thankyou'] = 'Thank you Yamini Patel for reaching out to Allwin. We have received your inquiry. We will contact you soon for the same.';

        // try {
        //     Mail::send('mail.thankyou', $data, function ($message) {
        //         $message->to('webdeveloper3.intelliworkz@gmail.com')
        //             ->subject('Thank You');
        //     });
        
        //     echo "Email sent successfully!";
        // } catch (Swift_TransportException $e) {
        //     echo 'Failed to send email. Error: ' . $e->getMessage();
        // }
        return view('front.testmail');
    }
}
