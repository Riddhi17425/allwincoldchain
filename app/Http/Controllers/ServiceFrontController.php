<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceFaq;
use Illuminate\Http\Request;

class ServiceFrontController extends Controller
{
    public function show($ser_url)
    {
        $data = Service::where('ser_url', $ser_url)
            ->where('is_delete', '0')
            ->firstOrFail();

        $dataFaq = ServiceFaq::where('service_id', $data->id)
            ->where('is_delete', '0')
            ->first();

        // SEO Meta Title and Description
        $metatitle = $data->meta_title ?: $data->service_header;

        $metadescription = $data->meta_description
            ?: strip_tags($data->work_desc ?? '');

        if ($dataFaq) {
            return view('front.service-detail', compact(
                'data',
                'dataFaq',
                'metatitle',
                'metadescription'
            ));
        }

        return view('front.service-detail', compact(
            'data',
            'metatitle',
            'metadescription'
        ));
    }
}