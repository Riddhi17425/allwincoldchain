<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Industry;
use App\Models\IndustryFaq;
class IndustryFrontController extends Controller
{
    public function show($ind_url)
    {
        
        $data = Industry::where('ind_url', $ind_url)->where('is_check', '0')->where('is_delete', '0')->firstOrFail();
        $dataFaq = IndustryFaq::where('industry_id', $data->id)->where('is_delete', '0')->first();
        
         $metatitle = $data->meta_title ?? $data->name;
    $metadescription = $data->meta_description ?? '';
    // dd($data);
        if ($dataFaq) {
            return view('front.industry-detail', compact('data','dataFaq','metatitle','metadescription'));
        } else {
            return view('front.industry-detail', compact('data','metatitle','metadescription'));
        }
    }

}
