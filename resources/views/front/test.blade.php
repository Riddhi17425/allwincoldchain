@include('layouts.frontheader')
<!--===== HERO AREA STARTS =======-->
<div class="slider-header-carousel owl-carousel">
  @php
  $bannerData = json_decode($data->banner_data, true);
  @endphp
  @foreach($bannerData as $index => $bannerDataa)
  <div class="hero1-section-area">
    <img src="{{asset('public/home-page-images/'. $bannerDataa['banner_img']) }}" class="header-img1" alt="{{$bannerDataa['banner_img']}}" loading="lazy">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="hero-heading-area heading1">
             @if($index === 0)
              <h2 class="main-heading">{{ $bannerDataa['banner_label'] }}</h2>
            @else
              <h2 class="main-heading">{{ $bannerDataa['banner_label'] }}</h2>
            @endif
            <p class="pera">{{$bannerDataa['banner_desc']}}</p>
            
            <div class="btn-area">
                <a href="https://www.allwincoldchainsolutions.com/contact-us" class="header-btn1">Contact Us <i class="fa-solid fa-arrow-right"></i></a>
              </div>
          </div>
        </div>

        <div class="col-lg-6">

        </div>
      </div>
    </div>
  </div>
  @endforeach


  <!-- <div class="hero1-section-area">
    <img src="{{asset('public/front/img/bg/banner-2.jpg')}}" alt="" class="header-img1">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="hero-heading-area heading1">
            <h1 class="main-heading">Innovating Cold Chain Packaging Solutions</h1>
            <p class="pera">At Allwin, we recognize that each industry has unique cold chain requirements. Whether it's life sciences, healthcare, or food distribution, our advanced solutions guarantee the safe, efficient transport of temperature-sensitive goods, customized to meet your specific needs.</p>
          </div>
        </div>

        <div class="col-lg-6">

        </div>
      </div>
    </div>
  </div>

  <div class="hero1-section-area">
    <img src="{{asset('public/front/img/bg/banner-3.jpg')}}" alt="" class="header-img1">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="hero-heading-area heading1">
            <h1 class="main-heading">Building a Sustainable Future with Passive Cold Chain Boxes</h1>
            <p class="pera">Committed to sustainability, Allwin’s PCM-based Passive Cold Chain Boxes eliminate energy consumption while maintaining excellence in temperature management, offering an eco-friendly solution to cold chain logistics.</p>
          </div>
        </div>

        <div class="col-lg-6">
        </div>
      </div>
    </div>
  </div> -->
</div>

<div class="about4-section-area sp1">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-12">
        <div class="about-header-area heading9">
          <p data-aos="fade-left" data-aos-duration="800" class="aos-init aos-animate bg-subhead">About Us</p>
          <h2 class="tg-element-title" style="perspective: 400px;">Temperature Controlled Packaging for Every Application</h2>
          <p data-aos="fade-left" data-aos-duration="1000" class="aos-init aos-animate mb-3">A cold chain's effectiveness depends greatly on its packaging. If the packaging has a fault, the consequences will span the entire spectrum from financial loss to loss of potency of a vaccine batch or early spoilage of seafood delivery or a laboratory sample that arrived outside of its safe range. Such failures happen too often, usually due to inadequate packaging.</p>
          <p data-aos="fade-left" data-aos-duration="1000" class="aos-init aos-animate">Allwin Cold Chain Solutions was built to close that gap. We design and supply <b>temperature control solutions</b> that keep products within their required temperature band for as long as the journey takes, whether that's a same-day local delivery or a multi-day international shipment. Our range is built to reduce spoilage, extend shelf life, and help you meet food safety and pharma compliance standards without adding complexity to your supply chain.</p>

          <div class="btn-area aos-init" data-aos="fade-left" data-aos-duration="1200">
            <a href="{{route('about-us.show')}}" class="header-btn7">About Us<i class="fa-solid fa-arrow-right"></i></a>
          </div>
        </div>
      </div>

      <!--<div class="col-lg-6">-->
      <!--  <div class="about-images-area">-->
      <!--    <div class="img1 aos-init aos-animate" data-aos="zoom-in" data-aos-duration="1000">-->
      <!--      <img src="{{asset('public/front/img/all-images/about_banner.jpg')}}" alt="">-->
      <!--    </div>-->
          <!--<div class="img2 aos-init aos-animate" data-aos="zoom-in" data-aos-duration="1100">-->
          <!--  <img src="{{asset('public/front/img/all-images/about_dp.jpg')}}" alt="">-->
          <!--</div>-->
          <!--<div class="content-experiance aos-init" data-aos="zoom-in" data-aos-duration="1200">-->
          <!--  <h2><span class="counter">16</span></h2>-->
          <!--  <p>Years of Experience</p>-->
          <!--</div>-->
      <!--  </div>-->
      <!--</div>-->
    </div>
  </div>
</div>

<div class="service3-section-area sp2">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="service-header-area heading7 text-center">
          <p data-aos="fade-up" data-aos-duration="800" class="bg-black-subhead">Our Products</p>
          <h2 class="tg-element-title">Your Partner in Reliable Temperature Controlled Packaging and Logistics</h2>
          <p data-aos="fade-up" data-aos-duration="1000">At Allwin Cold Chain Solutions, we specialize in providing innovative cold chain packaging products crucial for industries that rely on temperature control. Our range includes:</p>
        </div>
      </div>
    </div>
    <!--<div class="row">-->
    <!--  @foreach($product as $index => $products)-->
    <!--  <div class="col-lg-6 col-md-6" data-aos="zoom-in" data-aos-duration="800">-->
    <!--    <div class="service-auhtor-boxarea">-->
    <!--      <div class="icons">-->
    <!--        <img src="{{ asset('public/Product images/' . $products->product_icon) }}" alt="{{$products->product_icon}}">-->
    <!--      </div>-->
    <!--      <div class="content-area">-->
    <!--        <a href="{{ url('product/' . $products->prod_url) }}">{{$products-> product_header}}</a>-->
    <!--        <p>{{$products->product_desc}}</p>-->
    <!--        <a href="{{ url('product/' . $products->prod_url) }}" class="readmore">Read More <i class="fa-solid fa-arrow-right"></i></a>-->
    <!--      </div>-->
    <!--    </div>-->
    <!--  </div>-->
    <!--  @endforeach-->
    <!--</div>-->
    <div class="row">
            <div class="col-lg-4 col-md-4 aos-init aos-animate" data-aos="zoom-in" data-aos-duration="800">
                <div class="service-auhtor-boxarea">
                    <div class="icons">
                        <img src="{{ asset('public/service-images/xps-box.svg') }}" alt="xps-box">
                    </div>
                    <div class="content-area">
                        <a href="{{ route('products.show', 'single-use-packing')}}">Cold Chain Courier Shipper </a>
                        <p>Lightweight, insulated boxes ideal for shipping temperature-sensitive products.</p>
                        <a href="{{ route('products.show', 'single-use-packing')}}" class="readmore">Read More <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 aos-init aos-animate" data-aos="zoom-in" data-aos-duration="1000">
                <div class="service-auhtor-boxarea">
                    <div class="icons">
                        <img src="{{ asset('public/service-images/pallete-shipper.svg') }}" alt="pallete-shipper">
                    </div>
                    <div class="content-area">
                        <a href="#">Pallet Shipper</a>
                        <p>Designed for bulk shipments requiring temperature control.</p>
                        <a href="#" class="readmore">Read More <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 aos-init aos-animate" data-aos="zoom-in" data-aos-duration="1200">
                <div class="service-auhtor-boxarea">
                    <div class="icons">
                        <img src="{{ asset('public/product-images/cold-packs-pads-blue.svg') }}" alt="Cold Packs & Pads blue">
                    </div>
                    <div class="content-area">
                        <a href="{{ route('products.show', 'chill-pads')}}">PCM-Based Ice Packs/Chill Pads </a>
                        <p>(-40°C to +40°C*) Phase Change Material pads that maintain specific temperatures for long durations (up to 144*).  A big range of standard sizes and temperature ranges to suit all requirements.</p>
                        <a href="{{ route('products.show', 'chill-pads')}}" class="readmore">Read More <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 aos-init aos-animate" data-aos="zoom-in" data-aos-duration="1000">
                <div class="service-auhtor-boxarea">
                    <div class="icons">
                        <img src="{{ asset('public/product-images/vip.svg') }}" alt="vip">
                    </div>
                    <div class="content-area">
                        <a href="{{ route('products.show', 'reusable-shippers')}}">Reusable Shipper </a>
                        <p>Ultra-efficient, returnable cold chain packaging for highly sensitive goods.</p>
                        <a href="{{ route('products.show', 'reusable-shippers')}}" class="readmore">Read More <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 aos-init aos-animate" data-aos="zoom-in" data-aos-duration="1000">
                <div class="service-auhtor-boxarea">
                    <div class="icons">
                        <img src="{{ asset('public/product-images/data-loggers-blue.svg') }}" alt="Data Loggers">
                    </div>
                    <div class="content-area">
                        <a href="{{ route('products.show', 'data-loggers')}}">Data Loggers </a>
                        <p>Devices for monitoring and recording temperature during transit.</p>
                        <a href="{{ route('products.show', 'data-loggers')}}" class="readmore">Read More <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 aos-init aos-animate" data-aos="zoom-in" data-aos-duration="1000">
                <div class="service-auhtor-boxarea">
                    <div class="icons">
                        <img src="{{ asset('public/product-images/rccb.svg') }}" alt="Returnable Cold Chain Boxes: Built to Last ">
                    </div>
                    <div class="content-area">
                        <a href="{{ route('products.show', 'reusable-cold-chain-boxes')}}">Returnable Cold Chain Boxes: Built to Last </a>
                        <p>Our returnable cold chain boxes ensure lasting durability and thermal protection, keeping products fresh and secure.</p>
                        <a href="{{ route('products.show', 'reusable-cold-chain-boxes')}}" class="readmore">Read More <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--===== SERVICE AREA ENDS =======-->


<!--===== INDUSTRIES AREA STARTS =======-->
<div class="service1-section-area sp2">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 m-auto">
        <div class="service-header-area heading2 text-center">
          <p data-aos="fade-up" data-aos-duration="800" class="bg-subhead">Industries we serve</p>
          <h2 class="tg-element-title">Cold Chain Packaging Solutions for Every Industry </h2>
          <p data-aos="fade-up" data-aos-duration="1000">Allwin Cold Chain Solutions serves six major industry verticals, each with its own temperature requirements, regulatory considerations, and logistics challenges.</p>
        </div>
      </div>
    </div>

    <div class="row">
      @foreach($industry as $index => $industries)
      <div class="col-lg-4 col-md-6" data-aos="zoom-out" data-aos-duration="800">
        <div class="service-auhtor-boxarea">
          <div class="img1">
            <img src="{{ asset('public/industry-images/' . $industries->wall_image) }}" alt="industries-images">

          </div>
          <div class="content-area">
            <h3>{{ str_pad($index+1, 2, '0', STR_PAD_LEFT) }}</h3>
            <a href="{{ url('industry/' . $industries->ind_url) }}">{{$industries->industry_header}}</a>
            <p>{{$industries->work_title}}</p>
            <a href="{{ url('industry/' . $industries->ind_url) }}" class="readmore">Learn More <i class="fa-solid fa-arrow-right"></i></a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
<!--===== INDUSTRIES AREA ENDS =======-->


<!--<div class="service1-section-area">-->
<!--  <div class="container">-->
<!--    <div class="row">-->
<!--      <div class="col-lg-6 m-auto">-->
<!--        <div class="service-header-area heading2 text-center">-->
<!--          <p data-aos="fade-up" data-aos-duration="800" class="bg-subhead">Reasons to Choose Allwin Cold Chain Solutions</p>-->
<!--          <h2 class="tg-element-title">Leading Cold Chain Packaging Company in India </h2>-->
<!--          <p data-aos="fade-up" data-aos-duration="1000">Allwin Cold Chain Solutions is one of the few <b>temperature controlled packaging companies</b> that designs and supplies complete cold chain systems rather than standalone products. Whether you are a pharmaceutical manufacturer, food distributor, transporter, or end-user of temperature-critical goods, each requirement is treated as an individual project.</p>-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
<!--   </div>-->
<!--  </div>-->



<!--===== CASE STUDY AREA STARTS =======-->
<div class="casestudy-section-area sp1">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 m-auto">
        <div class="casestudy-header heading4 text-center">
          <p data-aos="fade-up" data-aos-duration="800" class="bg-subhead">Our Services</p>
          <h2 class="tg-element-title"> End-to-End Cold Chain Services You Can Trust</h2>
          <p data-aos="fade-up" data-aos-duration="1000">Allwin offers specialized cold chain services, including packaging solutions and comprehensive support to meet customer demands.</p>
        </div>
      </div>
    </div>


    <div class="col-lg-12" data-aos="fade-up" data-aos-duration="1000">
      <div class="casestudy-slider-area owl-carousel">
    @foreach($service as $index => $services)
        <div class="case-author-boxarea">
          <div class="imges">
            <img src="{{ asset('public/service-images/' . $services->service_banner_image) }}" alt="{{$services->service_banner_image}}">
          </div>

          <div class="case-content">
            <div class="text">
              <!--<a href="{{ url('service/' . $services->ser_url) }}">{{$services->service_header}}</a>-->
              <a>{{$services->service_header}}</a>
            </div>
            <!--<div class="icons">-->
            <!--  <a href="{{ url('service/' . $services->ser_url) }}"><span><i class="fa-solid fa-arrow-right"></i></span></a>-->
            <!--</div>-->
          </div>
        </div>
    @endforeach
      </div>
    </div>
  </div>
</div>

<!--===== CASE STUDY AREA ENDS =======-->

<div class="casestudy-section-area sp">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 m-auto">
        <div class="casestudy-header heading4 text-center">
          <p data-aos="fade-up" data-aos-duration="800" class="bg-subhead">Reasons to Choose Allwin Cold Chain Solutions</p>
          <h2 class="tg-element-title"> Leading Cold Chain Packaging Company in India</h2>
          <p data-aos="fade-up" data-aos-duration="1000">Allwin Cold Chain Solutions is one of the few <b>temperature controlled packaging companies</b> that designs and supplies complete cold chain systems rather than standalone products. Whether you are a pharmaceutical manufacturer, food distributor, transporter, or end-user of temperature-critical goods, each requirement is treated as an individual project.</p>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="casestudy-section-area sp">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 m-auto">
        <div class="casestudy-header heading4 text-center">
          <p data-aos="fade-up" data-aos-duration="800" class="bg-subhead"></p>
          <h2 class="tg-element-title">Why Businesses Across India Choose Allwin Cold Chain Solutions</h2>
          <p data-aos="fade-up" data-aos-duration="1000">Businesses across India trust Allwin Cold Chain Solutions for reliable, well-specified <b>cold chain packaging solutions</b> that protect temperature-sensitive products through storage and transportation. From pharmaceuticals and biotechnology to food, healthcare, and logistics, our range includes XPS and VIP insulated shippers, PCM-based chill pads, pallet shippers, reusable cold chain boxes, and temperature data loggers, giving organizations the tools to maintain product integrity while optimizing cold chain operations.</p>
        </div>
      </div>
    </div>
  </div>
</div>

@include('layouts.frontfooter')