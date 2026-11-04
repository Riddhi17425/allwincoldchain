<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
class AboutFrontController extends Controller
{
    public function show()
    {
         $metatitle = "About Allwin Cold Chain Solutions | Our Expertise";
         $metadescription = "Learn about Allwin Cold Chain Solutions and our expertise in temperature-controlled packaging for pharmaceutical, healthcare, food, and logistics industries.";
        $data = About::where('is_delete', '0')->where('id', 1)->first();
        // dd($data);
        return view('front.about-vision',compact('data','metatitle','metadescription'));
    }
}
