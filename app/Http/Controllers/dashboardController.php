<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use DB;
use Illuminate\Support\Facades\Mail;
use App\Models\About;
use App\Models\HomeAdmin;
use App\Models\Industry;
use App\Models\Product;
use App\Models\Service; 
use App\Models\Blogs;

class dashboardController extends Controller
{
      /**
       * Display a listing of the resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function login()
      {
            return view('auth.login');
      }
      public function admin()
      {
            return view('admin.admin');
      }
      public function index()
      {
            $metatitle = "Cold Chain Packaging Solutions";
            $metadescription = "Allwin cold chain packaging solutions are designed to keep products fresher for longer, ideal for food distribution, healthcare, pharma, seafood & ice cream.";
            $data = HomeAdmin::where('is_delete', '0')->where('id', 1)->first();
            $industry = Industry::where('is_delete', '0')
            //->whereIn('id', [11, 17, 12])
            ->get();
            $service = Service::where('is_delete', '0')->get();
            $product = Product::where('is_delete', '0')->get();
            // dd($industry);
            return view('front.index', compact('data','industry','service','product','metatitle','metadescription'));
      }
      public function aboutVision()
      {
         
            $data = About::where('is_delete', '0')->where('id', 1)->first();
            return view('front.about-vision', compact('data'));
      }
      public function product1()
      {
            return view('front.single-use-package');
      }
      public function product2()
      {
            return view('front.reusable-shipper');
      }
      public function product3()
      {
            return view('front.cold-pack-pads');
      }
      public function product4()
      {
            return view('front.data-loggers');
      }
      public function faq()
      {
          $metatitle = "FAQs – Cold Chain Logistics Solutions & Services";
          $metadescription = "Find answers to common questions about cold chain logistics, cold chain solutions, and cold chain services, including packaging, temperature control & more.";
            return view('front.faq',compact('metatitle','metadescription'));
      }
      
       
      public function blogs(){
        $metatitle = 'Blogs';
        $metadescription = 'Blogs Description';
            $blogs = Blogs::whereNull('deleted_at')
                  ->where('status', 'Active')
                  ->orderBy('id', 'desc')
                  ->get();
        return view('front.blog',compact('metatitle', 'metadescription','blogs'));
    }
    
    public function blogsdetail($url){
        
        $blogsdetail = Blogs::whereNull('deleted_at')
                  //->where('status', 'Active')
                  ->where('url', $url)
                  ->firstOrFail();
        $faqs = json_decode($blogsdetail->title_description, true);
        //dd($faqs);
        $metatitle = $blogsdetail->meta_title ?? $blogsdetail->title;
        $metadescription = $blogsdetail->meta_description ?? Str::limit(strip_tags($blogsdetail->description));
        $fileName = $blogsdetail->front_image ? rawurlencode($blogsdetail->front_image) : asset('public/home-page-images/banner-1.webp');
        $og_image = url('public/blogs/front_image/'.$fileName);
        
        return view('front.blog-detail',compact('metatitle', 'metadescription','blogsdetail','faqs', 'og_image'));
    }

}
