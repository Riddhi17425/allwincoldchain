<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{!! $metatitle ?? 'Allwin' !!}</title>
    <meta name="description" content="{!! html_entity_decode(strip_tags($metadescription ?? '')) !!}">
    <meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large"/>
    <!--OG Details-->
    <meta property="og:title" content="{!! $metatitle ?? 'Allwin' !!}">
    <meta property="og:description" content="{!! html_entity_decode(strip_tags($metadescription ?? '')) !!}" />
    <meta property="og:image" content="{{ $og_image ?? asset('public/home-page-images/banner-1.webp') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    @php
        $ogType = request()->is('blog/*') || request()->is('blog') ? 'article' : 'website';
    @endphp
    <meta property="og:type" content="{{$ogType}}">
    
    <!--Twitter X Card Tags-->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{!! $metatitle ?? 'Allwin' !!}">
    <meta name="twitter:description" content="{!! html_entity_decode(strip_tags($metadescription ?? '')) !!}">
    <meta name="twitter:image" content="{{ $og_image ?? asset('public/home-page-images/banner-1.webp') }}">

  <!--=====FAB ICON=======-->
  <!--<link rel="shortcut icon" href="{{ asset('public/front/img/logo/favicon-logo.svg')}}" type="image/x-icon">-->
  <!--<link rel="icon" type="image/svg+xml" href="{{ asset('public/front/img/logo/favicon-logo.svg') }}">-->
  <!--<link rel="icon" type="image/png" href="{{ asset('public/front/img/logo/favicon-logo.png') }}">-->
  <link rel="icon" href="{{ asset('public/front/img/logo/favicon-logo.ico') }}" sizes="any">


  <!--===== CSS LINK =======-->
 
  <link rel="stylesheet" href="{{ asset('public/front/css/plugins/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('public/front/css/plugins/aos.css')}}">
  <link rel="stylesheet" href="{{ asset('public/front/css/plugins/fontawesome.css')}}">
 
  <link rel="stylesheet" href="{{ asset('public/front/css/plugins/mobile.css')}}">
  <link rel="stylesheet" href="{{ asset('public/front/css/plugins/owlcarousel.min.css')}}">
 
  <link rel="stylesheet" href="{{ asset('public/front/css/main.css')}}">
    <link rel="canonical" href="{{ url()->current() }}">

  <!--=====  JS SCRIPT LINK =======-->
  <script src="{{ asset('public/front/js/plugins/jquery-3-6-0.min.js')}}"></script>
  
  <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-544NT685');</script>
<!-- End Google Tag Manager -->

<style>
    .paginacontainer
    {
        display:none;
    }
</style>

<!--Local Schema-->
<script type="application/ld+json">
{
"@context": "https://schema.org",
"@type": "LocalBusiness",
"name": "Allwin Cold Chain Solutions",
"image":
"https://www.allwincoldchainsolutions.com/public/home-page-images/Banner_2.webp",
"@id": "",
"url": "https://www.allwincoldchainsolutions.com/",
"telephone": "+91 96876 40805",
"priceRange": "-",
"address": {
"@type": "PostalAddress",
"streetAddress": "Survey No. NA1466, Yash Raj Industrial Estate, Plot No. 15, Khatraj Kalol
Road, Opp. Mayur Wovens, Moti Bhoyan",
"addressLocality": "Kalol",
"postalCode": "382721",
"addressCountry": "IN"
},
"geo": {
"@type": "GeoCoordinates",
"latitude": 23.156858918821857,
"longitude": 72.44730915767127
},
"openingHoursSpecification": {
"@type": "OpeningHoursSpecification",
"dayOfWeek": [
"Monday",
"Tuesday",
"Wednesday",
"Saturday",
"Friday",
"Thursday"
],
"opens": "10:00",
"closes": "19:00"
}
}
</script>


<!--Product Schema-->
<script type="application/ld+json">
{
"@context": "https://schema.org/",
"@type": "Product",
"name": "Allwin Cold Chain Solutions",
"image": "https://www.allwincoldchainsolutions.com/assets/images/logo.png",
"description": "Allwin Cold Chain Solutions provides temperature-controlled packaging and
logistics solutions for healthcare, life sciences, food distribution and other cold chain industries.",
"brand": {
"@type": "Brand",
"name": "Allwin Cold Chain Solutions"
},
"aggregateRating": {
"@type": "AggregateRating",
"ratingValue": "5.0",
"bestRating": "5",
"worstRating": "1",
"ratingCount": "1"
}
}
</script>
</head> 

<body class="homepage1-body tg-heading-subheading animation-style3">
    
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-544NT685"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

  @php
  $industries = DB::table('industry')->where('is_check','0')->where('is_delete','0')->get();
  $services = DB::table('service')->where('is_delete','0')->get();
  $product = DB::table('product')->where('is_delete','0')->get();
  @endphp
  <!--===== PRELOADER STARTS =======-->
  <div class="preloader">
    <div class="loading-container">
      <div class="loading"></div>
      <div id="loading-icon"><img src="{{ asset('public/front/img/logo/preloader-allwin.png')}}" alt="Allwin"></div>
    </div>
  </div>
  <!--===== PRELOADER ENDS =======-->

  <!--===== PROGRESS STARTS=======-->
  <div class="paginacontainer">
    <div class="progress-wrap">
      <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
      </svg>
    </div>
  </div>
  <!--===== PROGRESS ENDS=======-->

  <!--=====HEADER START=======-->
  <header>
    <div class="header-area homepage1 header header-sticky d-none d-lg-block " id="header">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="header-elements">
              <div class="site-logo">
                <a href="{{route('/')}}"><img src="{{ asset('public/front/img/logo/allwin_web_logo-1.svg')}}" alt="Allwin"></a>
              </div>
              <div class="main-menu">
                <ul>
              
                  <!-- <li><a href="javascript:void(0)">About <i class="fa-solid fa-angle-down"></i></a>
                    <ul class="dropdown-padding">
                      <li><a href="{{ route('about.vision')}}">Vision & Mission</a></li>
                      <li><a href="javascript:void(0)">Roadmap</a></li>
                    </ul>
                  </li> -->

                  <li><a href="javascript:void(0)">Products <i class="fa-solid fa-angle-down"></i></a>
                    <ul class="dropdown-padding">
                    @foreach ($product as $products)
                      <li>
                        <a href="{{ route('products.show', ['prod_url' => $products->prod_url]) }}">{{ $products->product_header }}</a>
                      </li>
                      @endforeach
                    </ul>
                  </li>
                  <li><a href="javascript:void(0)">Industries <i class="fa-solid fa-angle-down"></i></a>
                    <ul class="dropdown-padding">
                      @foreach ($industries as $industry)
                      <li>
                        <a href="{{ route('industries.show', ['ind_url' => $industry->ind_url]) }}">{{ $industry->industry_header }}</a>
                      </li>
                      @endforeach
                    </ul>
                  </li>
                  <!--<li><a href="#">Services <i class="fa-solid fa-angle-down"></i></a>-->
                  <!--  <ul class="dropdown-padding">-->
                  <!--  @foreach ($services as $service)-->
                  <!--    <li>-->
                  <!--      <a href="{{ route('services.show', ['ser_url' => $service->ser_url]) }}">{{ $service->service_header }}</a>-->
                  <!--    </li>-->
                  <!--    @endforeach-->
      
                  <!--  </ul>-->
                  <!--</li>-->
                  <li><a href="{{ route('about-us.show')}}">About</a></li>
                  <li><a href="{{ route('faq')}}">FAQ's</a></li>
                  <li><a href="{{ route('blog')}}">Blog</a></li>
                </ul>
              </div>
              <div class="btn-area">
                <a href="{{route('contact')}}" class="header-btn1">Contact Us <i class="fa-solid fa-arrow-right"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  
  <div class="mobile-header mobile-haeder1 d-block d-lg-none">
    <div class="container-fluid">
      <div class="col-12">
        <div class="mobile-header-elements">
          <div class="mobile-logo">
            <a href="{{route('/')}}"><img src="{{ asset('public/front/img/logo/allwin_web_logo-1.svg')}}" alt="Allwin" width="170"></a>
          </div>
          <div class="mobile-nav-icon dots-menu">
            <i class="fa-solid fa-bars"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="mobile-sidebar mobile-sidebar1">
    <div class="logosicon-area">
      <div class="logos">
        <img src="{{ asset('public/front/img/logo/allwin_web_logo-1.svg')}}" alt="Allwin" width="170">
      </div>
      <div class="menu-close">
        <i class="fa-solid fa-xmark"></i>
      </div>
    </div>
    <div class="mobile-nav mobile-nav1">
      <ul class="mobile-nav-list nav-list1">
        <li><a href="{{route('/')}}">Home </a></li>
        <li><a href="{{ route('about-us.show')}}">About</a></li>
        <li><a href="javascript:void(0)">Products</a>
          <ul class="sub-menu">
            @foreach ($product as $products)
                      <li>
                        <a href="{{ route('products.show', ['prod_url' => $products->prod_url]) }}">{{ $products->product_header }}</a>
                      </li>
                      @endforeach
          </ul>
        </li>
        <!--<li><a href="javascript:void(0)">Services</a>-->
        <!--  <ul class="sub-menu">-->
        <!--    <li><a href="service-detail.php">Speciality Cold Chain Packaging Services</a></li>-->
        <!--    <li><a href="service-detail.php">Monitored Environmental Chambers/Cold Rooms</a></li>-->
        <!--    <li><a href="service-detail.php">Implementation & Training</a></li>-->
        <!--    <li><a href="service-detail.php">Ongoing Temperature Management Support</a></li>-->
        <!--    <li><a href="service-detail.php">Shipping Lane Temperature Simulation</a></li>-->
        <!--    <li><a href="service-detail.php">Testing & Validation</a></li>-->
        <!--  </ul>-->
        <!--</li>-->
        <li><a href="{{ route('faq')}}">FAQ's</a></li>
        <li><a href="#">Industries</a>
          <ul class="sub-menu">
            @foreach ($industries as $industry)
                      <li>
                        <a href="{{ route('industries.show', ['ind_url' => $industry->ind_url]) }}">{{ $industry->industry_header }}</a>
                      </li>
            @endforeach
          </ul>
        </li>
        <li><a href="{{ route('blog')}}">Blog</a></li>
      </ul>

      <div class="allmobilesection">
        <a href="{{route('contact')}}" class="header-btn1">Get Started <i class="fa-solid fa-arrow-right"></i></a>
        <div class="single-footer">
          <h3>Contact Info</h3>
          <div class="footer1-contact-info">
            <div class="contact-info-single">
              <div class="contact-info-icon">
                <i class="fa-solid fa-phone-volume"></i>
              </div>
              <div class="contact-info-text">
                <a href="tel:+919687640805">+91 96876 40805</a>
              </div>
            </div>

            <!--<div class="contact-info-single">-->
            <!--  <div class="contact-info-icon">-->
            <!--    <i class="fa-solid fa-envelope"></i>-->
            <!--  </div>-->
            <!--  <div class="contact-info-text">-->
            <!--    <a href="mailto:allwincoldchainsolutions@gmail.com">allwincoldchainsolutions@gmail.com</a>-->
            <!--  </div>-->
            <!--</div>-->

            <div class="single-footer">
              <h3>Our Location</h3>

              <div class="contact-info-single">
                <div class="contact-info-icon">
                  <i class="fa-solid fa-location-dot"></i>
                </div>
                <div class="contact-info-text">
                  <a href="https://maps.app.goo.gl/Rrzfv9e6cfFicFcKA">Survey No. NA/1466, Plot No. 15,0pp. Mayur Wovens., Khatraj-Kalol- Road, Moti-Bhoyan -382721 Dist. Gandhinagar., Gujarat - INDIA.</a>
                </div>
              </div>

            </div>
            <!--<div class="single-footer">-->
            <!--  <h3>Social Links</h3>-->

            <!--  <div class="social-links-mobile-menu">-->
            <!--    <ul>-->
            <!--      <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>-->
            <!--      <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>-->
            <!--      <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>-->
            <!--      <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>-->
            <!--    </ul>-->
            <!--  </div>-->
            <!--</div>-->
          </div>
        </div>
      </div>
    </div>
  </div>