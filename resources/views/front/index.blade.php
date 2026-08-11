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
              <h1 class="main-heading">{{ $bannerDataa['banner_label'] }}</h2>
            @else
              <h2 class="main-heading">{{ $bannerDataa['banner_label'] }}</h2>
            @endif
            <p class="pera">{{$bannerDataa['banner_desc']}}</p>
            
            <div class="btn-area">
                <a href="{{route('contact')}}" class="header-btn1">Request a Quote<i class="fa-solid fa-arrow-right"></i></a>
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

<!-- new section create -->
 
<!-- new section create -->


<div class="service3-section-area" style="background-color: #ffffff;">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="service-header-area heading7 text-center">
          <p data-aos="fade-up" data-aos-duration="800" class="bg-subhead" style="color: #0077b6 !important; font-weight: 600;">Our Products</p>
          <h2 class="tg-element-title product-main-title" style="color: #1a1a1a;">Your Partner in Reliable Temperature Controlled Packaging and Logistics</h2>
          <style>
            @media (max-width: 767px) {
              .product-main-title {
                font-size: 26px !important;
                line-height: 1.3 !important;
                padding: 0 10px;
              }
            }
          </style>
          <p data-aos="fade-up" data-aos-duration="1000" style="color: #555;">At Allwin Cold Chain Solutions, we specialize in providing innovative cold chain packaging products crucial for industries that rely on temperature control. Our range includes:</p>
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
    <style>
      .product-slider-area {
        position: relative;
      }
      .product-slider-area .owl-item {
        padding: 0;
      }
      @media (max-width: 767px) {
        .product-image-box img {
          height: 420px !important;
          object-fit: cover !important;
          width: 100% !important;
        }
      }
      @media (max-width: 991px) {
        .product-slider-area {
          padding: 0;
        }
        .product-slider-area .owl-nav button.owl-prev,
        .product-slider-area .owl-nav button.owl-next {
          display: none !important;
        }
      }
      .product-slider-area .owl-nav button.owl-prev,
      .product-slider-area .owl-nav button.owl-next {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: #e9f2ff !important;
        color: #0d6efd !important;
        width: 45px;
        height: 45px;
        border-radius: 4px !important;
        font-size: 18px !important;
        transition: all 0.3s ease;
        z-index: 99;
        display: flex !important;
        align-items: center;
        justify-content: center;
        border: none !important; /* Removed border to match screenshot */
      }
      .product-slider-area .owl-nav button.owl-prev {
        left: -55px;
      }
      .product-slider-area .owl-nav button.owl-next {
        right: -55px;
      }
      .product-slider-area .owl-nav button:hover {
        background: #0d6efd !important;
        color: #ffffff !important;
      }
    </style>
    <div class="product-slider-area owl-carousel owl-theme" data-aos="fade-up" data-aos-duration="800">
    <div class="row align-items-center mb-5">
      <div class="col-lg-5 order-lg-2">
        <div class="product-image-box" style="text-align: center;">
           <img src="{{ asset('public/product-images/Single-use-XPS-Courier-shipper.jpg') }}" alt="Single Use Cold Chain Packaging" class="img-fluid">
        </div>
      </div>
      <div class="col-lg-7 order-lg-1">
        <div class="product-detail-content" style="padding: 20px;">
          <h3 style="font-size: 26px; font-weight: 700; color: #1a1a1a; margin-bottom: 15px;">1. Single Use Cold Chain Packaging</h3>
          <p style="color: #555; line-height: 1.7; margin-bottom: 25px; font-size: 16px;">When you need cold chain packaging that performs reliably on a single trip, without the need for returns logistics or asset management, single use cold chain packaging is the ideal solution. Our XPS (Extruded Polystyrene) courier shippers and pallet shippers are designed for convenience, compliance, and consistent thermal performance, keeping temperature-sensitive products protected from pickup to final delivery.</p>
          
          <div class="row">
            <div class="col-md-6 mb-4">
              <h5 style="font-size: 18px; font-weight: 600; color: #0077b6; margin-bottom: 15px;">What It Includes</h5>
              <ul style="list-style: none; padding: 0; margin: 0;">
                <li style="margin-bottom: 12px; display: flex; align-items: flex-start;"><i class="fa-solid fa-circle-check" style="color: #0077b6; margin-top: 5px; margin-right: 10px;"></i> <span style="color: #555; font-size: 15px;">XPS insulated courier shippers, available in multiple sizes from 3 to 68 litres</span></li>
                <li style="margin-bottom: 12px; display: flex; align-items: flex-start;"><i class="fa-solid fa-circle-check" style="color: #0077b6; margin-top: 5px; margin-right: 10px;"></i> <span style="color: #555; font-size: 15px;">XPS insulated pallet shippers for bulk, high-volume shipments</span></li>
                <li style="margin-bottom: 12px; display: flex; align-items: flex-start;"><i class="fa-solid fa-circle-check" style="color: #0077b6; margin-top: 5px; margin-right: 10px;"></i> <span style="color: #555; font-size: 15px;">Custom single-use packaging kits with chill pads and outer</span></li>
              </ul>
            </div>
            <div class="col-md-6 mb-4">
              <h5 style="font-size: 18px; font-weight: 600; color: #0077b6; margin-bottom: 15px;">Temperature & Hold Time</h5>
              <ul style="list-style: none; padding: 0; margin: 0;">
                <li style="margin-bottom: 12px; display: flex; align-items: flex-start;"><i class="fa-solid fa-temperature-half" style="color: #0077b6; margin-top: 5px; margin-right: 10px;"></i> <span style="color: #555; font-size: 15px;">2°C to 8°C - standard courier shipper range</span></li>
                <li style="margin-bottom: 12px; display: flex; align-items: flex-start;"><i class="fa-solid fa-clock" style="color: #0077b6; margin-top: 5px; margin-right: 10px;"></i> <span style="color: #555; font-size: 15px;">48 to 96 Hours - validated hold time, depending on model</span></li>
                <li style="margin-bottom: 12px; display: flex; align-items: flex-start;"><i class="fa-solid fa-clock" style="color: #0077b6; margin-top: 5px; margin-right: 10px;"></i> <span style="color: #555; font-size: 15px;">Up to 144 Hours - available on select pallet shipper configurations, including ultra-low -70°C options</span></li>
              </ul>
            </div>
          </div>
          <a href="{{ route('products.show', 'single-use-cold-chain-packaging')}}" class="header-btn1" style="padding: 10px 25px; font-size: 14px;">Read More <i class="fa-solid fa-arrow-right"></i></a>
        </div>
      </div>
    </div>
<!-- Product 2 -->
    <div class="row align-items-center mb-5">
      <div class="col-lg-5 order-lg-2">
        <div class="product-image-box" style="text-align: center;">
           <img src="{{ asset('public/product-images/VIP-Reusable-Shipper.jpg') }}" alt="Reusable Cold Chain Shippers" class="img-fluid">
        </div>
      </div>
      <div class="col-lg-7 order-lg-1">
        <div class="product-detail-content" style="padding: 20px;">
          <h3 style="font-size: 26px; font-weight: 700; color: #1a1a1a; margin-bottom: 15px;">2. Reusable Cold Chain Shippers</h3>
          <p style="color: #555; line-height: 1.7; margin-bottom: 25px; font-size: 16px;">Save packaging waste while keeping great thermal efficiency by using reusable cold chain shippers. Our VIP (Vacuum Insulated Panel) shippers are better in insulation capacity compared to regular containers and can be used more times while still maintaining effective temperature management.</p>
          
          <div class="row">
            <div class="col-md-6 mb-4">
              <h5 style="font-size: 18px; font-weight: 600; color: #0077b6; margin-bottom: 15px;">What It Includes</h5>
              <ul style="list-style: none; padding: 0; margin: 0;">
                <li style="margin-bottom: 12px; display: flex; align-items: flex-start;"><i class="fa-solid fa-circle-check" style="color: #0077b6; margin-top: 5px; margin-right: 10px;"></i> <span style="color: #555; font-size: 15px;">VIP (Vacuum Insulated Panel) courier shipper boxes</span></li>
                <li style="margin-bottom: 12px; display: flex; align-items: flex-start;"><i class="fa-solid fa-circle-check" style="color: #0077b6; margin-top: 5px; margin-right: 10px;"></i> <span style="color: #555; font-size: 15px;">Plastic insulated shippers for food, pharmaceutical, and other sensitive goods</span></li>
                <li style="margin-bottom: 12px; display: flex; align-items: flex-start;"><i class="fa-solid fa-circle-check" style="color: #0077b6; margin-top: 5px; margin-right: 10px;"></i> <span style="color: #555; font-size: 15px;">Made to order and standard size options</span></li>
              </ul>
            </div>
            <div class="col-md-6 mb-4">
              <h5 style="font-size: 18px; font-weight: 600; color: #0077b6; margin-bottom: 15px;">Temperature Performance</h5>
              <ul style="list-style: none; padding: 0; margin: 0;">
                <li style="margin-bottom: 12px; display: flex; align-items: flex-start;"><i class="fa-solid fa-temperature-half" style="color: #0077b6; margin-top: 5px; margin-right: 10px;"></i> <span style="color: #555; font-size: 15px;">Higher insulation efficiency than XPS packaging</span></li>
                <li style="margin-bottom: 12px; display: flex; align-items: flex-start;"><i class="fa-solid fa-temperature-half" style="color: #0077b6; margin-top: 5px; margin-right: 10px;"></i> <span style="color: #555; font-size: 15px;">Suited for critical, long-duration shipments</span></li>
                <li style="margin-bottom: 12px; display: flex; align-items: flex-start;"><i class="fa-solid fa-temperature-half" style="color: #0077b6; margin-top: 5px; margin-right: 10px;"></i> <span style="color: #555; font-size: 15px;">Available in made-to-order and standard configurations</span></li>
              </ul>
            </div>
          </div>
          <a href="{{ route('products.show', 'reusable-shippers')}}" class="header-btn1" style="padding: 10px 25px; font-size: 14px;">Read More <i class="fa-solid fa-arrow-right"></i></a>
        </div>
      </div>
    </div>

<!-- Product 3 -->
    <div class="row align-items-center mb-5">
      <div class="col-lg-5 order-lg-2">
        <div class="product-image-box" style="text-align: center;">
           <img src="{{ asset('public/product-images/Cold-packs-&-Pads.jpg') }}" alt="PCM-Based Ice Packs/Chill Pads" class="img-fluid">
        </div>
      </div>
      <div class="col-lg-7 order-lg-1">
        <div class="product-detail-content" style="padding: 20px;">
          <h3 style="font-size: 26px; font-weight: 700; color: #1a1a1a; margin-bottom: 15px;">3. PCM-Based Ice Packs/Chill Pads</h3>
          <p style="color: #555; line-height: 1.7; margin-bottom: 25px; font-size: 16px;">Keep products within their required temperature range using high-quality chill pads designed for pharmaceutical, food, dairy, biotechnology, and healthcare logistics. Our phase-change coolant pads provide consistent temperature control without direct contact with sensitive products.</p>
          
          <div class="row">
            <div class="col-md-6 mb-4">
              <h5 style="font-size: 18px; font-weight: 600; color: #0077b6; margin-bottom: 15px;">Available Solutions</h5>
              <ul style="list-style: none; padding: 0; margin: 0;">
                <li style="margin-bottom: 12px; display: flex; align-items: flex-start;"><i class="fa-solid fa-circle-check" style="color: #0077b6; margin-top: 5px; margin-right: 10px;"></i> <span style="color: #555; font-size: 15px;">Phase Change Material (PCM) coolant pads in 10 sizes, from 0.4 kg to 4 kg</span></li>
                <li style="margin-bottom: 12px; display: flex; align-items: flex-start;"><i class="fa-solid fa-circle-check" style="color: #0077b6; margin-top: 5px; margin-right: 10px;"></i> <span style="color: #555; font-size: 15px;">Multiple phase-change temperature points: 0°C, +5°C, +18°C, -16°C, -22°C, -33°C</span></li>
                <li style="margin-bottom: 12px; display: flex; align-items: flex-start;"><i class="fa-solid fa-circle-check" style="color: #0077b6; margin-top: 5px; margin-right: 10px;"></i> <span style="color: #555; font-size: 15px;">Custom-sized chill pads on request</span></li>
              </ul>
            </div>
            <div class="col-md-6 mb-4">
              <h5 style="font-size: 18px; font-weight: 600; color: #0077b6; margin-bottom: 15px;">Performance</h5>
              <ul style="list-style: none; padding: 0; margin: 0;">
                <li style="margin-bottom: 12px; display: flex; align-items: flex-start;"><i class="fa-solid fa-clock" style="color: #0077b6; margin-top: 5px; margin-right: 10px;"></i> <span style="color: #555; font-size: 15px;">Typically holds temperature for 72 to 96 hours, depending on external conditions</span></li>
                <li style="margin-bottom: 12px; display: flex; align-items: flex-start;"><i class="fa-solid fa-shield-halved" style="color: #0077b6; margin-top: 5px; margin-right: 10px;"></i> <span style="color: #555; font-size: 15px;">Leak-resistant construction</span></li>
                <li style="margin-bottom: 12px; display: flex; align-items: flex-start;"><i class="fa-solid fa-temperature-half" style="color: #0077b6; margin-top: 5px; margin-right: 10px;"></i> <span style="color: #555; font-size: 15px;">Available across multiple temperature ranges</span></li>
              </ul>
            </div>
          </div>
          <a href="{{ route('products.show', 'chill-pads')}}" class="header-btn1" style="padding: 10px 25px; font-size: 14px;">Read More <i class="fa-solid fa-arrow-right"></i></a>
        </div>
      </div>
    </div>

<!-- Product 4 -->
    <div class="row align-items-center mb-5">
      <div class="col-lg-5 order-lg-2">
        <div class="product-image-box" style="text-align: center;">
           <img src="{{ asset('public/product-images/data_loggers.jpg') }}" alt="Temperature Data Loggers" class="img-fluid">
        </div>
      </div>
      <div class="col-lg-7 order-lg-1">
        <div class="product-detail-content" style="padding: 20px;">
          <h3 style="font-size: 26px; font-weight: 700; color: #1a1a1a; margin-bottom: 15px;">4. Temperature Data Loggers</h3>
          <p style="color: #555; line-height: 1.7; margin-bottom: 25px; font-size: 16px;">Ensure complete visibility throughout your cold chain with cold chain monitoring. Temperature data loggers let you monitor, record, and verify shipment conditions to maintain compliance, reduce product loss, and improve supply chain efficiency.</p>
          
          <div class="row">
            <div class="col-md-6 mb-4">
              <h5 style="font-size: 18px; font-weight: 600; color: #0077b6; margin-bottom: 15px;">Available Solutions</h5>
              <ul style="list-style: none; padding: 0; margin: 0;">
                <li style="margin-bottom: 12px; display: flex; align-items: flex-start;"><i class="fa-solid fa-circle-check" style="color: #0077b6; margin-top: 5px; margin-right: 10px;"></i> <span style="color: #555; font-size: 15px;">Single-Use loggers for one-time shipments</span></li>
                <li style="margin-bottom: 12px; display: flex; align-items: flex-start;"><i class="fa-solid fa-circle-check" style="color: #0077b6; margin-top: 5px; margin-right: 10px;"></i> <span style="color: #555; font-size: 15px;">Multi-Use loggers, reusable and resettable after each shipment</span></li>
                <li style="margin-bottom: 12px; display: flex; align-items: flex-start;"><i class="fa-solid fa-circle-check" style="color: #0077b6; margin-top: 5px; margin-right: 10px;"></i> <span style="color: #555; font-size: 15px;">Live Temperature and Humidity Monitoring devices for real-time tracking</span></li>
              </ul>
            </div>
            <div class="col-md-6 mb-4">
              <h5 style="font-size: 18px; font-weight: 600; color: #0077b6; margin-bottom: 15px;">Key Features</h5>
              <ul style="list-style: none; padding: 0; margin: 0;">
                <li style="margin-bottom: 12px; display: flex; align-items: flex-start;"><i class="fa-solid fa-chart-line" style="color: #0077b6; margin-top: 5px; margin-right: 10px;"></i> <span style="color: #555; font-size: 15px;">Continuous temperature recording</span></li>
                <li style="margin-bottom: 12px; display: flex; align-items: flex-start;"><i class="fa-solid fa-chart-line" style="color: #0077b6; margin-top: 5px; margin-right: 10px;"></i> <span style="color: #555; font-size: 15px;">Real-time updates on temperature and humidity</span></li>
                <li style="margin-bottom: 12px; display: flex; align-items: flex-start;"><i class="fa-solid fa-chart-line" style="color: #0077b6; margin-top: 5px; margin-right: 10px;"></i> <span style="color: #555; font-size: 15px;">Historical data access to verify past shipment conditions</span></li>
                <li style="margin-bottom: 12px; display: flex; align-items: flex-start;"><i class="fa-solid fa-chart-line" style="color: #0077b6; margin-top: 5px; margin-right: 10px;"></i> <span style="color: #555; font-size: 15px;">Devices can be reset and reused after each cycle</span></li>
              </ul>
            </div>
          </div>
          <a href="{{ route('products.show', 'data-loggers')}}" class="header-btn1" style="padding: 10px 25px; font-size: 14px;">Read More <i class="fa-solid fa-arrow-right"></i></a>
        </div>
      </div>
    </div>

<!-- Product 5 -->
    <div class="row align-items-center mb-5">
      <div class="col-lg-5 order-lg-2">
        <div class="product-image-box" style="text-align: center;">
           <img src="{{ asset('public/product-images/returnable-cold-chain-box.jpg') }}" alt="Reusable Cold Chain Boxes" class="img-fluid">
        </div>
      </div>
      <div class="col-lg-7 order-lg-1">
        <div class="product-detail-content" style="padding: 20px;">
          <h3 style="font-size: 26px; font-weight: 700; color: #1a1a1a; margin-bottom: 15px;">5. Reusable Cold Chain Boxes</h3>
          <p style="color: #555; line-height: 1.7; margin-bottom: 25px; font-size: 16px;">Protect high-value temperature-sensitive products with reusable, one-piece molded insulated boxes engineered for long-term performance. Designed for repeated use, these boxes deliver excellent thermal insulation while reducing waste and lowering shipping costs.</p>
          
          <div class="row">
            <div class="col-md-6 mb-4">
              <h5 style="font-size: 18px; font-weight: 600; color: #0077b6; margin-bottom: 15px;">Product Range</h5>
              <ul style="list-style: none; padding: 0; margin: 0;">
                <li style="margin-bottom: 12px; display: flex; align-items: flex-start;"><i class="fa-solid fa-circle-check" style="color: #0077b6; margin-top: 5px; margin-right: 10px;"></i> <span style="color: #555; font-size: 15px;">One-piece molded insulated boxes</span></li>
                <li style="margin-bottom: 12px; display: flex; align-items: flex-start;"><i class="fa-solid fa-circle-check" style="color: #0077b6; margin-top: 5px; margin-right: 10px;"></i> <span style="color: #555; font-size: 15px;">Available with or without chill pads</span></li>
                <li style="margin-bottom: 12px; display: flex; align-items: flex-start;"><i class="fa-solid fa-circle-check" style="color: #0077b6; margin-top: 5px; margin-right: 10px;"></i> <span style="color: #555; font-size: 15px;">Custom configurations for pharma, food and beverage, and fisheries</span></li>
              </ul>
            </div>
            <div class="col-md-6 mb-4">
              <h5 style="font-size: 18px; font-weight: 600; color: #0077b6; margin-bottom: 15px;">Key Features</h5>
              <ul style="list-style: none; padding: 0; margin: 0;">
                <li style="margin-bottom: 12px; display: flex; align-items: flex-start;"><i class="fa-solid fa-shield-halved" style="color: #0077b6; margin-top: 5px; margin-right: 10px;"></i> <span style="color: #555; font-size: 15px;">Unbreakable design: tough, one-piece molded construction</span></li>
                <li style="margin-bottom: 12px; display: flex; align-items: flex-start;"><i class="fa-solid fa-temperature-half" style="color: #0077b6; margin-top: 5px; margin-right: 10px;"></i> <span style="color: #555; font-size: 15px;">Superior insulation for maintaining desired temperatures</span></li>
                <li style="margin-bottom: 12px; display: flex; align-items: flex-start;"><i class="fa-solid fa-leaf" style="color: #0077b6; margin-top: 5px; margin-right: 10px;"></i> <span style="color: #555; font-size: 15px;">Sustainability-focused, reusable design that cuts waste and cost over time</span></li>
              </ul>
            </div>
          </div>
          <a href="{{ route('products.show', 'reusable-cold-chain-boxes')}}" class="header-btn1" style="padding: 10px 25px; font-size: 14px;">Read More <i class="fa-solid fa-arrow-right"></i></a>
        </div>
      </div>
    </div>

<!-- Product 6 -->
    <div class="row align-items-center mb-5">
      <div class="col-lg-5 order-lg-2">
        <div class="product-image-box" style="text-align: center;">
           <img src="{{ asset('public/product-images/Single-use-XPS-Pallet-shipper.jpg') }}" alt="Pallet Shippers" class="img-fluid">
        </div>
      </div>
      <div class="col-lg-7 order-lg-1">
        <div class="product-detail-content" style="padding: 20px;">
          <h3 style="font-size: 26px; font-weight: 700; color: #1a1a1a; margin-bottom: 15px;">6. Pallet Shippers</h3>
          <p style="color: #555; line-height: 1.7; margin-bottom: 25px; font-size: 16px;">Protect high-volume shipments that are sensitive to temperature by using insulated XPS pallet shippers, as they are designed for logistics in both local and international areas. These pallet shippers come in multiple sizes and range of temperature, from 2 degrees Celsius to even the ultra-low of negative 70 degrees Celsius.</p>
          
          <div class="row">
            <div class="col-md-6 mb-4">
              <h5 style="font-size: 18px; font-weight: 600; color: #0077b6; margin-bottom: 15px;">What It Includes</h5>
              <ul style="list-style: none; padding: 0; margin: 0;">
                <li style="margin-bottom: 12px; display: flex; align-items: flex-start;"><i class="fa-solid fa-circle-check" style="color: #0077b6; margin-top: 5px; margin-right: 10px;"></i> <span style="color: #555; font-size: 15px;">XPS insulated pallet shippers in multiple capacities, from around 120 litres up to 1,270 litres</span></li>
                <li style="margin-bottom: 12px; display: flex; align-items: flex-start;"><i class="fa-solid fa-circle-check" style="color: #0077b6; margin-top: 5px; margin-right: 10px;"></i> <span style="color: #555; font-size: 15px;">Standard (2°C to 8°C), controlled ambient (15°C to 25°C), and ultra-low (-70°C) configurations</span></li>
                <li style="margin-bottom: 12px; display: flex; align-items: flex-start;"><i class="fa-solid fa-circle-check" style="color: #0077b6; margin-top: 5px; margin-right: 10px;"></i> <span style="color: #555; font-size: 15px;">Validated hold times ranging from 72 to 144 hours depending on model</span></li>
              </ul>
            </div>
            <div class="col-md-6 mb-4">
              <h5 style="font-size: 18px; font-weight: 600; color: #0077b6; margin-bottom: 15px;">Typical Applications</h5>
              <ul style="list-style: none; padding: 0; margin: 0;">
                <li style="margin-bottom: 12px; display: flex; align-items: flex-start;"><i class="fa-solid fa-check" style="color: #0077b6; margin-top: 5px; margin-right: 10px;"></i> <span style="color: #555; font-size: 15px;">Pharmaceutical distribution</span></li>
                <li style="margin-bottom: 12px; display: flex; align-items: flex-start;"><i class="fa-solid fa-check" style="color: #0077b6; margin-top: 5px; margin-right: 10px;"></i> <span style="color: #555; font-size: 15px;">Vaccine transportation</span></li>
                <li style="margin-bottom: 12px; display: flex; align-items: flex-start;"><i class="fa-solid fa-check" style="color: #0077b6; margin-top: 5px; margin-right: 10px;"></i> <span style="color: #555; font-size: 15px;">Food & beverage logistics</span></li>
                <li style="margin-bottom: 12px; display: flex; align-items: flex-start;"><i class="fa-solid fa-check" style="color: #0077b6; margin-top: 5px; margin-right: 10px;"></i> <span style="color: #555; font-size: 15px;">Dairy and frozen food supply chains</span></li>
                <li style="margin-bottom: 12px; display: flex; align-items: flex-start;"><i class="fa-solid fa-check" style="color: #0077b6; margin-top: 5px; margin-right: 10px;"></i> <span style="color: #555; font-size: 15px;">Cold storage distribution</span></li>
                <li style="margin-bottom: 12px; display: flex; align-items: flex-start;"><i class="fa-solid fa-check" style="color: #0077b6; margin-top: 5px; margin-right: 10px;"></i> <span style="color: #555; font-size: 15px;">International air and ocean freight</span></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function(){
    $(".product-slider-area").owlCarousel({
      loop: true,
      margin: 30,
      nav: true,
      dots: false,
      items: 1,
      autoplay: true,
      autoplayTimeout: 10000,
      autoplayHoverPause: true,
      smartSpeed: 1000,
      navText: ["<i class='fa-solid fa-arrow-left'></i>","<i class='fa-solid fa-arrow-right'></i>"]
    });
  });
</script>
<!--===== SERVICE AREA ENDS =======-->

<!--===== INDUSTRIES AREA STARTS =======-->
<div class="service1-section-area sp2">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 m-auto">
        <div class="service-header-area heading2 text-center">
          <p data-aos="fade-up" data-aos-duration="800" class="bg-subhead">Industries we serve</p>
          <h2 class="tg-element-title">Cold Chain Packaging Solutions for Every Industry </h2>
          <p data-aos="fade-up" data-caos-duration="1000">Allwin Cold Chain Solutions serves six major industry verticals, each with its own temperature requirements, regulatory considerations, and logistis challenges.</p>
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
          <p data-aos="fade-up" data-aos-duration="800" class="bg-subhead">Why Choose Us</p>
          <h2 class="tg-element-title">Why Businesses Across India Choose Allwin Cold Chain Solutions</h2>
          <p data-aos="fade-up" data-aos-duration="1000">Businesses across India trust Allwin Cold Chain Solutions for reliable, well-specified <b>cold chain packaging solutions</b> that protect temperature-sensitive products through storage and transportation. From pharmaceuticals and biotechnology to food, healthcare, and logistics, our range includes XPS and VIP insulated shippers, PCM-based chill pads, pallet shippers, reusable cold chain boxes, and temperature data loggers, giving organizations the tools to maintain product integrity while optimizing cold chain operations.</p>
        </div>
      </div>
    </div>
  </div>
</div>


<!--===== CTA AREA STARTS =======-->
<div class="container" style="margin-bottom: 80px;">
  <div class="cta-section-area" style="background-color: #0077b6; padding: 70px 40px; border-radius: 20px; text-align: center; ">
    <div class="row justify-content-center">
      <div class="col-lg-9 m-auto" data-aos="fade-up" data-aos-duration="800">
        <h2 style="color: #ffffff; font-size: 36px; font-weight: 700; margin-bottom: 20px;">Ready to secure your cold chain?</h2>
        <p style="color: #e9ecef; font-size: 16px; line-height: 1.6; margin-bottom: 35px;">You can order pharmaceutical-grade cold chain packaging and other specialized solutions through our dedicated team, backed by local expertise and responsive support.</p>
        <a href="{{ url('contact-us') }}" class="header-btn1 cta-white-btn" style="padding: 14px 40px; font-size: 16px; display: inline-block;">Contact Us <i class="fa-solid fa-arrow-right" style="margin-left: 6px;"></i></a>
      </div>
    </div>
  </div>
</div>

<style>
  .cta-white-btn {
    background-color: #ffffff !important;
    color: #0077b6 !important;
    border: none !important;
  }
  .cta-white-btn:hover {
    background-color: #0056b3 !important;
    color: #ffffff !important;
  }
</style>
<!--===== CTA AREA ENDS =======-->

<!--===== FAQ AREA STARTS =======-->
<div class="faq-section-area mb-5">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 m-auto">
        <div class="service-header-area heading7 text-center">
          <p data-aos="fade-up" data-aos-duration="800" class="bg-subhead" style="color: #0077b6 !important; font-weight: 600;">Frequently Asked Questions</p>
          <h2 class="tg-element-title" style="color:#142637;font-weight: bold;">Cold Chain Packaging</h2>
        </div>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="service-rightside-area heading2">
          <div class="faq-auhtor-area1">
            <div class="accordion accordion-flush active" id="accordionFlushExample">
            
            <div class="accordion-item aos-init" data-aos="fade-up" data-aos-duration="800">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse1" aria-expanded="false" aria-controls="flush-collapse1">
                        1. What is cold chain packaging?
                    </button>
                </h2>
                <div id="flush-collapse1" class="accordion-collapse collapse show" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Cold chain packaging is insulated packaging designed to keep temperature-sensitive products, such as vaccines, food, and laboratory samples, within a required temperature range during storage and transport.</div>
                </div>
            </div>
            <div class="space20"></div>

            <div class="accordion-item aos-init" data-aos="fade-up" data-aos-duration="800">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse2" aria-expanded="false" aria-controls="flush-collapse2">
                        2. What is the difference between single use and reusable cold chain packaging?
                    </button>
                </h2>
                <div id="flush-collapse2" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Single use packaging, such as our XPS courier and pallet shippers, is designed for one trip and does not require return logistics. Reusable packaging, such as our VIP (Vacuum Insulated Panel) shippers, offers higher insulation efficiency and is built for repeated shipping cycles, reducing cost per shipment over time.</div>
                </div>
            </div>
            <div class="space20"></div>

            <div class="accordion-item aos-init" data-aos="fade-up" data-aos-duration="800">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse3" aria-expanded="false" aria-controls="flush-collapse3">
                        3. How long do chill pads keep products cold compared to regular ice packs?
                    </button>
                </h2>
                <div id="flush-collapse3" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Our PCM (Phase Change Material) coolant pads typically maintain their set temperature for 72 to 96 hours, depending on external conditions and the phase-change point selected. Available phase-change points range from -33°C to +18°C.</div>
                </div>
            </div>
            <div class="space20"></div>

            <div class="accordion-item aos-init" data-aos="fade-up" data-aos-duration="800">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse4" aria-expanded="false" aria-controls="flush-collapse4">
                        4. What temperature range does Allwin Cold Chain Solutions support?
                    </button>
                </h2>
                <div id="flush-collapse4" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Allwin supports a temperature range of -40°C to +40°C, covering frozen, refrigerated, and controlled ambient shipments.</div>
                </div>
            </div>
            <div class="space20"></div>

            <div class="accordion-item aos-init" data-aos="fade-up" data-aos-duration="800">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse5" aria-expanded="false" aria-controls="flush-collapse5">
                        5. Which cold chain packaging is best for pharmaceutical distribution in India?
                    </button>
                </h2>
                <div id="flush-collapse5" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">This depends on shipment frequency and value. For single or infrequent shipments, an XPS courier or pallet shipper is generally suitable. For frequent or high-value pharmaceutical routes, a VIP reusable shipper paired with a temperature data logger provides both stronger insulation and a verifiable temperature record.</div>
                </div>
            </div>
            <div class="space20"></div>

            <div class="accordion-item aos-init" data-aos="fade-up" data-aos-duration="800">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse6" aria-expanded="false" aria-controls="flush-collapse6">
                        6. How do I choose between single use packaging and reusable shippers?
                    </button>
                </h2>
                <div id="flush-collapse6" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">The decision typically comes down to shipment frequency. Single use (XPS) packaging tends to be more cost-effective for one-off or irregular shipments, while reusable (VIP) shippers offer better long-term value for frequent shipments on the same routes.</div>
                </div>
            </div>
            <div class="space20"></div>

            <div class="accordion-item aos-init" data-aos="fade-up" data-aos-duration="800">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse7" aria-expanded="false" aria-controls="flush-collapse7">
                        7. Is Allwin Cold Chain Solutions WHO GDP and FDA compliant?
                    </button>
                </h2>
                <div id="flush-collapse7" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">XPS (Extruded Polystyrene) boxes are lightweight and cost-effective, suited to short and medium-term shipments. VIP (Vacuum Insulated Panel) boxes provide higher insulation efficiency and are better suited to critical shipments requiring longer or more precise temperature control.</div>
                </div>
            </div>
            <div class="space20"></div>

            <div class="accordion-item aos-init" data-aos="fade-up" data-aos-duration="800">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse8" aria-expanded="false" aria-controls="flush-collapse8">
                        8. Can Allwin Cold Chain supply custom-sized cold chain packaging?
                    </button>
                </h2>
                <div id="flush-collapse8" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Yes. Boxes, shippers, and PCM packs can be customized based on volume, temperature range, or transit time requirements.</div>
                </div>
            </div>
            <div class="space20"></div>

            <div class="accordion-item aos-init" data-aos="fade-up" data-aos-duration="800">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse9" aria-expanded="false" aria-controls="flush-collapse9">
                        9. How many times can reusable cold chain shippers be used?
                    </button>
                </h2>
                <div id="flush-collapse9" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Our reusable shippers, including the VIP (Vacuum Insulated Panel) range, are built for multiple shipping cycles rather than a single trip, making them a more cost-effective option over time compared to single-use packaging. Actual lifespan depends on handling conditions and shipping frequency.</div>
                </div>
            </div>
            <div class="space20"></div>

            <div class="accordion-item aos-init" data-aos="fade-up" data-aos-duration="800">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse10" aria-expanded="false" aria-controls="flush-collapse10">
                        10. Does Allwin Cold Chain supply cold chain packaging for e-commerce and DTC food delivery?
                    </button>
                </h2>
                <div id="flush-collapse10" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Yes. Our insulated courier shippers and PCM chill pads are suited for last-mile e-commerce and direct-to-consumer deliveries, including food and pharmaceutical shipments.</div>
                </div>
            </div>
            <div class="space20"></div>

          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--===== FAQ AREA ENDS =======-->



@include('layouts.frontfooter')