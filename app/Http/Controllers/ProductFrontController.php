<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductFaq;

class ProductFrontController extends Controller
{
    public function show($prod_url)
    {
        $data = Product::where('prod_url', $prod_url)->where('is_delete', '0')->firstOrFail();
        $dataFaq = ProductFaq::where('product_id', $data->id)->where('is_delete', '0')->first();
        $faqs = $dataFaq ? json_decode($dataFaq->title_description, true) : [];
        // {{dd($data);}}
          $metatitle = $data->meta_title ?? $data->name;
    $metadescription = $data->meta_description ?? '';
        return view('front.product-detail', compact('data','dataFaq','faqs','metatitle','metadescription'));
    }
}
