<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
class AboutFrontController extends Controller
{
    public function show()
    {
         $metatitle = "About Us | Allwin Cold Chain Solutions";
          $metadescription = "Learn about Allwin Cold Chain Solutions, a leading cold chain company in India delivering temperature-controlled packaging & logistics for pharma, food & healthcare industries.";
        $data = About::where('is_delete', '0')->where('id', 1)->first();
        // dd($data);
        return view('front.about-vision',compact('data','metatitle','metadescription'));
    }
}
