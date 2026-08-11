<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceFaq;
use Illuminate\Http\Request;

class ServiceFrontController extends Controller
{
    public function show($ser_url)
    {
        $data = Service::where('ser_url', $ser_url)->where('is_delete', '0')->firstOrFail();
        $dataFaq = ServiceFaq::where('service_id', $data->id)->where('is_delete', '0')->first();
    
        if ($dataFaq) {
            return view('front.service-detail', compact('data','dataFaq'));
        } else {
            return view('front.service-detail', compact('data'));
        }
    }

}
