<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class ColdChainPackagingSolutions extends Controller
{
    public function index()
    {

        $docRoot    = rtrim(str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT'] ?? ''), '/');
        $publicPath = str_replace('\\', '/', public_path());

        $publicUrl = ($docRoot !== '' && stripos($publicPath, $docRoot) === 0)
            ? substr($publicPath, strlen($docRoot)) 
            : '';

        return view('front.cold-chain-packaging-solutions', [
            'publicUrl' => $publicUrl,              
            'assetBase' => $publicUrl . '/assets',
        ]);
    }
}