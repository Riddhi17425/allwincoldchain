@include('layouts.frontheader')

<!--===== HERO AREA STARTS =======-->

<div class="hero1-section-area about-bg-area">

    <img src="{{asset('public/product-images/'. $data->product_header_image)}}" alt="{{$data->product_header_image}}" class="header-img1">

    <div class="container">

        <div class="row">

            <div class="col-lg-7 m-auto">

                <div class="hero-heading-area heading1 text-center">

                    <h1>{{$data->title}}</h1>

                    <a href="{{ url('/')}}" class="backline">Home <i class="fa-solid fa-angle-right"></i><span>{{$data->title}}</span></a>

                </div>

            </div>

        </div>

    </div>

</div>

<!--===== HERO AREA ENDS =======-->

@if ($data->prod_url == 'single-use-packing')

@php

$tableData = json_decode($data->table_details, true);

@endphp

@foreach($tableData as $index => $tab)

<div class="about2-section-area sp1">

    <div class="container">

        <div class="row align-items-center {{ !empty($tab['image']) && $index % 2 != 0 ? 'flex-row-reverse' : '' }}">

            @if(!empty($tab['image']))

            <div class="col-lg-6">

                <div class="about-images-area aos-init aos-animate" data-aos="zoom-out" data-aos-duration="1000">

                    <div class="img1">

                        <img src="{{asset('public/product-images/'. $tab['image'])}}" alt="{{$tab['image']}}" class="header-img1">

                    </div>

                </div>

            </div>

            <div class="col-lg-6">

                <div class="about-header-area heading4">

                    <!--<h5 data-aos="fade-left" data-aos-duration="800" class="aos-init aos-animate">Why Choose Us</h5>-->

                    <h2 class="tg-element-title" style="perspective: 400px;">

                        {{ $tab['label'] }}

                    </h2>

                    <p data-aos="fade-left" data-aos-duration="1000" class="aos-init">{!! $tab['desc'] !!}</p>

                    <div class="space40"></div>

                </div>

            </div>

            @else

            <div class="col-lg-12">

                <div class="about-header-area heading4 text-center">

                    <!--<h5 class="aos-init aos-animate" data-aos="fade-up" data-aos-duration="800">Why Choose Us</h5>-->

                    <h2 class="tg-element-title" style="perspective: 400px;">

                        {{ $tab['label'] }}

                    </h2>

                    <div class="content-only-body">{!! $tab['desc'] !!}</div>

                    <div class="space40"></div>

                </div>

            </div>

            @endif

        </div>

    </div>

</div>

@php
    // Summernote (WYSIWYG editor) saves an empty description as HTML like
    // "<p><br></p>" instead of a truly empty string, so empty() alone
    // doesn't detect it. Strip tags and trim to check if there's real
    // visible text left, so a fully-cleared CTA doesn't still render an
    // empty blue card.
    $ctaTitleHasContent = trim($tab['cta_title'] ?? '') !== '';
    $ctaDescHasContent = trim(strip_tags($tab['cta_desc'] ?? '')) !== '';
@endphp
@if($ctaTitleHasContent || $ctaDescHasContent)
<div class="container cta-banner-wrapper">
  <div class="cta-banner-area">
    <div class="row align-items-center">
      <div class="col-lg-10 m-auto text-center" data-aos="fade-up" data-aos-duration="800">
        @if($ctaTitleHasContent)
        <h3 class="cta-banner-title">{{ $tab['cta_title'] }}</h3>
        @endif

        @if($ctaDescHasContent)
        <div class="cta-banner-desc">{!! $tab['cta_desc'] !!}</div>
        @endif

        <a href="{{ url('contact-us') }}" class="header-btn1 cta-white-btn" style="padding: 14px 40px; font-size: 16px; display: inline-block;">Contact Us <i class="fa-solid fa-arrow-right" style="margin-left: 6px;"></i></a>
      </div>
    </div>
  </div>
</div>
@endif

@if ($index == 0)

<div class="my-5">

    <div class="container table-responsive">

        <table border="1" cellpadding="5" cellspacing="0" class="table table-bordered">

            <thead>

                <tr class="text-center" style="background-color:#0077b6;color:white">

                    <td colspan="11"><b>Courier Shipper</b></td>

                </tr>

                <tr style="background-color:#eff9ff">

                    <th class="w-25">Model Code</th>

                    <th>Temp Range</th>

                    <th>Validation Hrs</th>

                    <th>Shipper OD (mm) L W H</th>

                    <th>Sipper ID (mm) L W H</th>

                    <th>Usable Product(mm) L W H</th>

                    <th>Usable In Ltr</th>

                    <th>Gross Weight Inc Gell Pack</th>

                </tr>

            </thead>

            <tbody>

                 <tr>

            <td>ACS-26</td>

            <td>2 to 8</td>

            <td>72 Hrs</td>

            <td>480x440x495</td>

            <td>310x270x315</td>

            <td>235x180x135</td>

            <td>5 Ltr</td>

            <td>13.5Kg</td>

        </tr>

        <tr>

            <td>ACS-30</td>

            <td>2 to 8</td>

            <td>48 Hrs</td>

            <td>485x370x440</td>

            <td>370x260x320</td>

            <td>303x220x130</td>

            <td>9 Ltr</td>

            <td>10.8Kg</td>

        </tr>

        <tr>

            <td>ACS-40</td>

            <td>2 to 8</td>

            <td>72 Hrs</td>

            <td>570x470x520</td>

            <td>400x300x340</td>

            <td>400x300x125</td>

            <td>15 Ltr</td>

            <td>21.41Kg</td>

        </tr>

        <tr>

            <td>ACS-91</td>

            <td>2 to 8</td>

            <td>72 Hrs</td>

            <td>680x590x618</td>

            <td>506x416x435</td>

            <td>400x310x250</td>

            <td>31 Ltr</td>

            <td>33.77Kg</td>

        </tr>

        <tr>

            <td>ACS-103</td>

            <td>2 to 8</td>

            <td>72 Hrs</td>

            <td>715x605x630</td>

            <td>540x430x445</td>

            <td>440x340x270</td>

            <td>40 Ltr</td>

            <td>33.77Kg</td>

        </tr>

        <tr>

            <td>ACS-43</td>

            <td>2 to 8</td>

            <td>96 Hrs</td>

            <td>570x470x545</td>

            <td>400x300x365</td>

            <td>380x280x105</td>

            <td>11 Ltr</td>

            <td>22.9Kg</td>

        </tr>

        <tr>

            <td>ACS-152</td>

            <td>2 to 8</td>

            <td>72 Hrs</td>

            <td>740x570x890</td>

            <td>560x390x700</td>

            <td>480x310x460</td>

            <td>68 Ltr</td>

            <td>34.6Kg</td>

        <tr>

            <td>ACS-10</td>

            <td>2 to 8</td>

            <td>48 Hrs</td>

            <td>370x300x320</td>

            <td>260x190x210</td>

            <td>260x190x70</td>

            <td>3 Ltr</td>

            <td>5.4Kg</td>

        </tr>

        <tr>

            <td>ACS-13</td>

            <td>2 to 8</td>

            <td>48 Hrs</td>

            <td>364x306x390</td>

            <td>253x195x275</td>

            <td>245x190x95</td>

            <td>4 Ltrr</td>

            <td>5.5Kg</td>

        </tr>

        <tr>

            <td>ACS-55</td>

            <td>2 to 8</td>

            <td>48 Hrs</td>

            <td>550x450x480</td>

            <td>440x340x370</td>

            <td>350x250x185</td>

            <td>16 Ltr</td>

            <td>23Kg</td>

        </tr>

        <tr>

            <td>ACS-14</td>

            <td>2 to 8</td>

            <td>48 Hrs</td>

            <td>367x285x435</td>

            <td>255x175x325</td>

            <td>230x150x145</td>

            <td>5 Ltr</td>

            <td>5.93Kg</td>

        </tr>

            </tbody>

        </table>

    </div>

</div>

@endif

@if ($index == 1)

<div class="my-5">

  <div class="container table-responsive">

    <table border="1" cellpadding="5" cellspacing="0" class="table table-bordered">

      <thead>

        <tr class="text-center" style="background-color:#0077b6; color:white">

          <td colspan="11">

            <b>Pallet Shipper</b>

          </td>

        </tr>

        <tr style="background-color:#eff9ff">

          <th class="w-25">Model Code</th>

          <th>Temp Range</th>

          <th>Validation Hrs</th>

          <th>Shipper OD (mm) L W H</th>

          <th>Sipper ID (mm) L W H</th>

          <th>Usable Product(mm) L W H</th>

          <th>Usable In Ltr</th>

          <th>Gross Weight Inc Gell Pack</th>

        </tr>

      </thead>

      <tbody>

        <tr>

                <td>APS-305</td>

                <td>2 to 8</td>

                <td>120 Hrs</td>

                <td>850x850x795</td>

                <td>735x735x565</td>

                <td>630x630x410</td>

                <td>162 Ltr</td>

                <td>119kg</td>

              </tr>

              <tr>

                <td>APS-418</td>

                <td>2 to 8</td>

                <td>72 Hrs</td>

                <td>1180x780x970</td>

                <td>1010x610x680</td>

                <td>960x510x480</td>

                <td>237 Ltr</td>

                <td>110kg</td>

              </tr>

              <tr>

                <td>APS-635</td>

                <td>2 to 8</td>

                <td>137 Hrs</td>

                <td>1235x1045x1015</td>

                <td>1065x865x690</td>

                <td>940x740x400</td>

                <td>229 Ltr</td>

                <td>139kg</td>

              </tr>

              <tr>

                <td>APS-1844</td>

                <td>2 to 8</td>

                <td>94 Hrs</td>

                <td>1595x1200x1575</td>

                <td>1410x1030x1270</td>

                <td>1220x820x1100</td>

                <td>1100 Ltr</td>

                <td>300kg</td>

              </tr>

              <tr>

                <td>APS-1721</td>

                <td>15 to 25</td>

                <td>100 Hrs</td>

                <td>1523x1145x1565</td>

                <td>1355x985x1290</td>

                <td>1255x900x1125</td>

                <td>1270 Ltr</td>

                <td>225kg</td>

              </tr>

              <tr>

                <td>APS-385</td>

                <td>2 to 8</td>

                <td>103 Hrs</td>

                <td>935x775x1090</td>

                <td>760x600x845</td>

                <td>450x450x600</td>

                <td>121 Ltr</td>

                <td>93kg</td>

              </tr>

              <tr>

                <td>APS-884</td>

                <td>-70</td>

                <td>144 Hrs</td>

                <td>1200x1200x1085</td>

                <td>1065x1065x780</td>

                <td>930x930x645 </td>

                <td>557 Ltr</td>

                <td>170kg</td>

              </tr>

              <tr>

                <td>APS-1271</td>

                <td>15 to 25</td>

                <td>89 Hrs</td>

                <td>1045x1335x1575</td>

                <td>885x1145x1255</td>

                <td>775x1040x1040</td>

                <td>838 Ltr</td>

                <td>179Kg</td>

              </tr>

      </tbody>

    </table>

  </div>

</div>

@endif

@endforeach

@endif

@if ($data->prod_url == 'reusable-shippers')

@php

$tableData = json_decode($data->table_details, true);

@endphp

@foreach($tableData as $index => $tab)

<!-- why choose us -->

<div class="about2-section-area sp1">

    <div class="container">

        <div class="row align-items-center {{ !empty($tab['image']) && $index % 2 != 0 ? 'flex-row-reverse' : '' }}">

            @if(!empty($tab['image']))

            <div class="col-lg-6">

                <div class="about-images-area aos-init aos-animate" data-aos="zoom-out" data-aos-duration="1000">

                    <div class="img1">

                        <img src="{{asset('public/product-images/'. $tab['image'])}}" alt="{{$tab['image']}}" class="header-img1">

                    </div>

                </div>

            </div>

            <div class="col-lg-6">

                <div class="about-header-area heading4">

                    <!--<h5 data-aos="fade-left" data-aos-duration="800" class="aos-init aos-animate">Why Choose Us</h5>-->

                    <h2 class="tg-element-title" style="perspective: 400px;">

                        {{ $tab['label'] }}

                    </h2>

                    <p data-aos="fade-left" data-aos-duration="1000" class="aos-init">{!! $tab['desc'] !!}</p>

                    <div class="space40"></div>

                </div>

            </div>

            @else

            <div class="col-lg-12">

                <div class="about-header-area heading4 text-center">

                    <!--<h5 class="aos-init aos-animate" data-aos="fade-up" data-aos-duration="800">Why Choose Us</h5>-->

                    <h2 class="tg-element-title" style="perspective: 400px;">

                        {{ $tab['label'] }}

                    </h2>

                    <div class="content-only-body">{!! $tab['desc'] !!}</div>

                    <div class="space40"></div>

                </div>

            </div>

            @endif

        </div>

    </div>

</div>

@php
    // Summernote (WYSIWYG editor) saves an empty description as HTML like
    // "<p><br></p>" instead of a truly empty string, so empty() alone
    // doesn't detect it. Strip tags and trim to check if there's real
    // visible text left, so a fully-cleared CTA doesn't still render an
    // empty blue card.
    $ctaTitleHasContent = trim($tab['cta_title'] ?? '') !== '';
    $ctaDescHasContent = trim(strip_tags($tab['cta_desc'] ?? '')) !== '';
@endphp
@if($ctaTitleHasContent || $ctaDescHasContent)
<div class="container cta-banner-wrapper">
  <div class="cta-banner-area">
    <div class="row align-items-center">
      <div class="col-lg-10 m-auto text-center" data-aos="fade-up" data-aos-duration="800">
        @if($ctaTitleHasContent)
        <h3 class="cta-banner-title">{{ $tab['cta_title'] }}</h3>
        @endif

        @if($ctaDescHasContent)
        <div class="cta-banner-desc">{!! $tab['cta_desc'] !!}</div>
        @endif

        <a href="{{ url('contact-us') }}" class="header-btn1 cta-white-btn" style="padding: 14px 40px; font-size: 16px; display: inline-block;">Contact Us <i class="fa-solid fa-arrow-right" style="margin-left: 6px;"></i></a>
      </div>
    </div>
  </div>
</div>
@endif

@if ($index == 0)

<h2 class="tg-element-title text-center" style="font-size:42px">Made to Order and Standard Size Available</h2>

@endif

@endforeach

@endif

@if ($data->prod_url == 'chill-pads')

@php

$tableData = json_decode($data->table_details, true);

@endphp

@foreach($tableData as $index => $tab)

<!-- why choose us -->

<div class="about2-section-area sp1">

    <div class="container">

        <div class="row align-items-center {{ !empty($tab['image']) && $index % 2 != 0 ? 'flex-row-reverse' : '' }}">

            @if(!empty($tab['image']))

            <div class="col-lg-6">

                <div class="about-images-area aos-init aos-animate" data-aos="zoom-out" data-aos-duration="1000">

                    <div class="img1">

                        <img src="{{asset('public/product-images/'. $tab['image'])}}" alt="{{$tab['image']}}" class="header-img1">

                    </div>

                </div>

            </div>

            <div class="col-lg-6">

                <div class="about-header-area heading4">

                    <!--<h5 data-aos="fade-left" data-aos-duration="800" class="aos-init aos-animate">Why Choose Us</h5>-->

                    <h2 class="tg-element-title" style="perspective: 400px;">

                        {{ $tab['label'] }}

                    </h2>

                    <p data-aos="fade-left" data-aos-duration="1000" class="aos-init">{!! $tab['desc'] !!}</p>

                    <div class="space40"></div>

                </div>

            </div>

            @else

            <div class="col-lg-12">

                <div class="about-header-area heading4 text-center">

                    <!--<h5 class="aos-init aos-animate" data-aos="fade-up" data-aos-duration="800">Why Choose Us</h5>-->

                    <h2 class="tg-element-title" style="perspective: 400px;">

                        {{ $tab['label'] }}

                    </h2>

                    <div class="content-only-body">{!! $tab['desc'] !!}</div>

                    <div class="space40"></div>

                </div>

            </div>

            @endif

        </div>

    </div>

</div>

@php
    // Summernote (WYSIWYG editor) saves an empty description as HTML like
    // "<p><br></p>" instead of a truly empty string, so empty() alone
    // doesn't detect it. Strip tags and trim to check if there's real
    // visible text left, so a fully-cleared CTA doesn't still render an
    // empty blue card.
    $ctaTitleHasContent = trim($tab['cta_title'] ?? '') !== '';
    $ctaDescHasContent = trim(strip_tags($tab['cta_desc'] ?? '')) !== '';
@endphp
@if($ctaTitleHasContent || $ctaDescHasContent)
<div class="container cta-banner-wrapper">
  <div class="cta-banner-area">
    <div class="row align-items-center">
      <div class="col-lg-10 m-auto text-center" data-aos="fade-up" data-aos-duration="800">
        @if($ctaTitleHasContent)
        <h3 class="cta-banner-title">{{ $tab['cta_title'] }}</h3>
        @endif

        @if($ctaDescHasContent)
        <div class="cta-banner-desc">{!! $tab['cta_desc'] !!}</div>
        @endif

        <a href="{{ url('contact-us') }}" class="header-btn1 cta-white-btn" style="padding: 14px 40px; font-size: 16px; display: inline-block;">
          Contact Us <i class="fa-solid fa-arrow-right" style="margin-left: 6px;"></i>
        </a>
      </div>
    </div>
  </div>
</div>
@endif

<!--table-->

<div class="my-5">

  <div class="container table-responsive">

    <table border="1" cellpadding="5" cellspacing="0" class="table table-bordered">

      <thead>

        <tr class="text-center" style="background-color:#0077b6; color:white">

          <td colspan="4">

            <b>Coolant Pads</b>

          </td>

        </tr>

        <tr style="background-color:#eff9ff">

          <th>Model Code</th>

          <th>Dimension(mm) LxWxH</th>

          <th>Volume (Kg)</th>

          <th>Tamp Range</th>

        </tr>

      </thead>

      <tbody>

        <tr>

          <td>ACCPC-400-T</td>

          <td>165X95X35</td>

          <td>0.400Kg</td>

          <td>PC-0,+5,+18,-16,-22,-33</td>

        </tr>

        <tr>

          <td>ACCPC-500</td>

          <td>125x150x35</td>

          <td>0.500kg</td>

          <td>PC-0,+5,+18,-16,-22,-33</td>

        </tr>

        <tr>

          <td>ACCPC-550</td>

          <td>220x150x22</td>

          <td>0.610Kg</td>

          <td>PC-0,+5,+18,-16,-22,-33</td>

        </tr>

        <tr>

          <td>ACCPC-600</td>

          <td>250x150x25</td>

          <td>0.690Kg</td>

          <td>PC-0,+5,+18,-16,-22,-33</td>

        </tr>

        <tr>

          <td>ACCPC-600-T</td>

          <td>190X120X35</td>

          <td>40Kg</td>

          <td>PC-0,+5,+18,-16,-22,-33</td>

        </tr>

        <tr>

          <td>ACCPC-750</td>

          <td>190x150x35</td>

          <td>0.770Kg</td>

          <td>PC-0,+5,+18,-16,-22,-33</td>

        </tr>

        <tr>

          <td>ACCPC-1000</td>

          <td>250x150x35</td>

          <td>1.08Kg</td>

          <td>PC-0,+5,+18,-16,-22,-33</td>

        </tr>

        <tr>

          <td>ACCPC-1600</td>

          <td>285x280x25</td>

          <td>1.9Kg</td>

          <td>PC-0,+5,+18,-16,-22,-33</td>

        </tr>

        <tr>

          <td>ACCPC-2000</td>

          <td>290x230x40</td>

          <td>2Kg</td>

          <td>PC-0,+5,+18,-16,-22,-33</td>

        </tr>

        <tr>

          <td>ACCPC-4000</td>

          <td>330x285x50</td>

          <td>4Kg</td>

          <td>PC-0,+5,+18,-16,-22,-33</td>

        </tr>

      </tbody>

    </table>

  </div>

</div>

@endforeach

@endif

@if ($data->prod_url == 'data-loggers')

@php

$tableData = json_decode($data->table_details, true);

@endphp

@foreach($tableData as $index => $tab)

<!-- why choose us -->

<div class="about2-section-area sp1">

    <div class="container">

        <div class="row align-items-center {{ !empty($tab['image']) && $index % 2 != 0 ? 'flex-row-reverse' : '' }}">

            @if(!empty($tab['image']))

            <div class="col-lg-6">

                <div class="about-images-area aos-init aos-animate" data-aos="zoom-out" data-aos-duration="1000">

                    <div class="img1">

                        <img src="{{asset('public/product-images/'. $tab['image'])}}" alt="{{$tab['image']}}" class="header-img1">

                    </div>

                </div>

            </div>

            <div class="col-lg-6">

                <div class="about-header-area heading4">

                    <!--<h5 data-aos="fade-left" data-aos-duration="800" class="aos-init aos-animate">Why Choose Us</h5>-->

                    <h2 class="tg-element-title" style="perspective: 400px;">

                        {{ $tab['label'] }}

                    </h2>

                    <p data-aos="fade-left" data-aos-duration="1000" class="aos-init">{!! $tab['desc'] !!}</p>

                    <div class="space40"></div>

                </div>

            </div>

            @else

            <div class="col-lg-12">

                <div class="about-header-area heading4 text-center">

                    <!--<h5 class="aos-init aos-animate" data-aos="fade-up" data-aos-duration="800">Why Choose Us</h5>-->

                    <h2 class="tg-element-title" style="perspective: 400px;">

                        {{ $tab['label'] }}

                    </h2>

                    <div class="content-only-body">{!! $tab['desc'] !!}</div>

                    <div class="space40"></div>

                </div>

            </div>

            @endif

        </div>

    </div>

</div>

@php
    // Summernote (WYSIWYG editor) saves an empty description as HTML like
    // "<p><br></p>" instead of a truly empty string, so empty() alone
    // doesn't detect it. Strip tags and trim to check if there's real
    // visible text left, so a fully-cleared CTA doesn't still render an
    // empty blue card.
    $ctaTitleHasContent = trim($tab['cta_title'] ?? '') !== '';
    $ctaDescHasContent = trim(strip_tags($tab['cta_desc'] ?? '')) !== '';
@endphp
@if($ctaTitleHasContent || $ctaDescHasContent)
<div class="container cta-banner-wrapper">
  <div class="cta-banner-area">
    <div class="row align-items-center">
      <div class="col-lg-10 m-auto text-center" data-aos="fade-up" data-aos-duration="800">
        @if($ctaTitleHasContent)
        <h3 class="cta-banner-title">{{ $tab['cta_title'] }}</h3>
        @endif

        @if($ctaDescHasContent)
        <div class="cta-banner-desc">{!! $tab['cta_desc'] !!}</div>
        @endif

        <a href="{{ url('contact-us') }}" class="header-btn1 cta-white-btn" style="padding: 14px 40px; font-size: 16px; display: inline-block;">
          Contact Us <i class="fa-solid fa-arrow-right" style="margin-left: 6px;"></i>
        </a>
      </div>
    </div>
  </div>
</div>
@endif

@endforeach

@endif

@if ($data->prod_url == 'reusable-cold-chain-boxes')

@php

$tableData = json_decode($data->table_details, true);

@endphp

@foreach($tableData as $index => $tab)

<!-- why choose us -->

<div class="about2-section-area sp1">

    <div class="container">

        <div class="row align-items-center {{ !empty($tab['image']) && $index % 2 != 0 ? 'flex-row-reverse' : '' }}">

            @if(!empty($tab['image']))

            <div class="col-lg-6">

                <div class="about-images-area aos-init aos-animate" data-aos="zoom-out" data-aos-duration="1000">

                    <div class="img1">

                        <img src="{{asset('public/product-images/'. $tab['image'])}}" alt="{{$tab['image']}}" class="header-img1">

                    </div>

                </div>

            </div>

            <div class="col-lg-6">

                <div class="about-header-area heading4">

                    <!--<h5 data-aos="fade-left" data-aos-duration="800" class="aos-init aos-animate">Why Choose Us</h5>-->

                    <h2 class="tg-element-title" style="perspective: 400px;">

                        {{ $tab['label'] }}

                    </h2>

                    <p data-aos="fade-left" data-aos-duration="1000" class="aos-init"> {!! $tab['desc'] !!}</p>

                    <div class="space40"></div>

                </div>

            </div>

            @else

            <div class="col-lg-12">

                <div class="about-header-area heading4 text-center">

                    <!--<h5 class="aos-init aos-animate" data-aos="fade-up" data-aos-duration="800">Why Choose Us</h5>-->

                    <h2 class="tg-element-title" style="perspective: 400px;">

                        {{ $tab['label'] }}

                    </h2>

                    <div class="content-only-body">{!! $tab['desc'] !!}</div>

                    <div class="space40"></div>

                </div>

            </div>

            @endif

        </div>

    </div>

</div>

@php
    // Summernote (WYSIWYG editor) saves an empty description as HTML like
    // "<p><br></p>" instead of a truly empty string, so empty() alone
    // doesn't detect it. Strip tags and trim to check if there's real
    // visible text left, so a fully-cleared CTA doesn't still render an
    // empty blue card.
    $ctaTitleHasContent = trim($tab['cta_title'] ?? '') !== '';
    $ctaDescHasContent = trim(strip_tags($tab['cta_desc'] ?? '')) !== '';
@endphp
@if($ctaTitleHasContent || $ctaDescHasContent)
<div class="container cta-banner-wrapper">
  <div class="cta-banner-area">
    <div class="row align-items-center">
      <div class="col-lg-10 m-auto text-center" data-aos="fade-up" data-aos-duration="800">
        @if($ctaTitleHasContent)
        <h3 class="cta-banner-title">{{ $tab['cta_title'] }}</h3>
        @endif

        @if($ctaDescHasContent)
        <div class="cta-banner-desc">{!! $tab['cta_desc'] !!}</div>
        @endif

        <a href="{{ url('contact-us') }}" class="header-btn1 cta-white-btn" style="padding: 14px 40px; font-size: 16px; display: inline-block;">
          Contact Us <i class="fa-solid fa-arrow-right" style="margin-left: 6px;"></i>
        </a>
      </div>
    </div>
  </div>
</div>
@endif

@endforeach

@endif











<!-- <div class="space32"></div> -->



@if(!empty($faqs))

<div class="service-rightside-area heading2">

    <div class="container">

        <div class="heading1 text-center faq-heading-wrap">

            <h2 class="tg-element-title faq-main-title">Frequently Asked Questions</h2>

        </div>

        <div class="faq-auhtor-area1 faq-custom-wrap">

            <div class="accordion accordion-flush active" id="accordionFlushExample">

                @foreach($faqs as $index => $faq)

                <div class="accordion-item aos-init faq-custom-item" data-aos="fade-left" data-aos-duration="800">

                    <h2 class="accordion-header">

                        <button class="accordion-button faq-custom-button {{ $index != 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{ $index }}" aria-expanded="{{ $index == 0 ? 'true' : 'false' }}" aria-controls="flush-collapse{{ $index }}">

                            {{ $faq['title'] }}

                        </button>

                    </h2>

                    <div id="flush-collapse{{ $index }}" class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}" data-bs-parent="#accordionFlushExample">

                        <div class="accordion-body faq-custom-body">{{ $faq['description'] }}</div>

                    </div>

                </div>

                @endforeach

            </div>

        </div>

    </div>

</div>

<style>

.faq-heading-wrap {

    margin-bottom: 24px;

}

.faq-main-title {

    font-size: 32px !important;

    font-weight: 700;

    color: #0b1f3a;

}

.faq-custom-wrap {

    max-width: 900px;

    margin: 0 auto;

    padding-bottom: 60px;

}

.faq-custom-item {

    background: #f5f7f9;

    border: none !important;

    border-radius: 10px;

    margin-bottom: 14px;

    overflow: hidden;

    transition: box-shadow 0.2s ease;

}

.faq-custom-item:hover {

    box-shadow: 0 4px 14px rgba(0, 0, 0, 0.06);

}

.faq-custom-button {

    background: transparent !important;

    color: #0b1f3a !important;

    font-weight: 600;

    font-size: 16px;

    padding: 18px 22px;

    box-shadow: none !important;

    border: none !important;

}

.faq-custom-button:not(.collapsed) {

    color: #0077b6 !important;

}

.faq-custom-button:focus {

    box-shadow: none !important;

    border-color: transparent !important;

}

.faq-custom-button::after {

    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www\.w3.org/2000/svg' width='16' height='16' fill='%230b1f3a' viewBox='0 0 16 16'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");

}

.faq-custom-body {

    padding: 0 22px 18px 22px;

    color: #5a6472;

    font-size: 15px;

    line-height: 1.6;

}

@media (max-width: 768px) {

    .faq-main-title {

        font-size: 24px !important;

    }

    .faq-custom-button {

        font-size: 15px;

        padding: 14px 16px;

    }

}

</style>

@endif

<style>

/* Restore bullet/number styling for summernote content (applies site-wide on this page,

   regardless of whether FAQs are present) */

.about-header-area ul {

    list-style: disc;

    padding-left: 20px;

    margin-bottom: 15px;

}

.about-header-area ul li {

    list-style: disc;

    margin-bottom: 8px;

}

.about-header-area ol {

    list-style: decimal;

    padding-left: 20px;

    margin-bottom: 15px;

}

.about-header-area ol li {

    list-style: decimal;

    margin-bottom: 8px;

}

/* Full-width content-only section (no image) */

.content-only-body {

    max-width: 900px;

    margin: 15px auto 0;

    text-align: left;

    color: #5a6472;

    font-size: 16px;

    line-height: 1.75;

}

.content-only-body ul,

.content-only-body ol {

    padding-left: 20px;

    margin-bottom: 0;

}

.content-only-body ul li,

.content-only-body ol li {

    margin-bottom: 8px;

}

/* main.css mein .sp1 ka padding: 100px 0 hai (sitewide use hota hai).
   Is product-show page par naye sections (CTA banner, content-only
   layout) add hone ke baad sections ke beech gap bahut zyada ho gaya
   tha. Chunki ye <style> block sirf isi blade file/page par load hota
   hai, yahan .sp1 ko override karne se sirf is page ka spacing kam
   hoga — baaki site par jahan .sp1 use ho raha hai wo untouched
   rahega. */
.about2-section-area.sp1 {
    padding: 40px 0;
}

/* CTA banner ke andar spacing consistent karne ke liye - flex + gap use
   kar rahe hain jo sirf actually maujood elements ke beech gap deta hai. */

.cta-banner-area .row > div {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 18px;
}

.cta-banner-title {
    margin-bottom: 0;
}

.cta-banner-desc {
    margin-bottom: 0;
}

/* CTA banner */
.cta-banner-area {
    background-color: #0077b6;
    border: none;
    border-radius: 20px;
    padding: 30px 35px;
    text-align: center;
}

.cta-banner-title {
    color: #ffffff;
    font-size: 22px;
    font-weight: 700;
}

.cta-banner-desc {
    color: #e9ecef;
    font-size: 16px;
    line-height: 1.6;
}

.cta-white-btn {
    background-color: #ffffff !important;
    color: #0077b6 !important;
    border: none !important;
  }


.cta-white-btn:hover {
    background-color: #0056b3 !important;
    color: #ffffff !important;
  }

@media (max-width: 768px) {
    .cta-banner-area {
        padding: 22px 20px;
        border-radius: 15px;
    }

    .cta-banner-title {
        font-size: 19px;
    }

    .cta-banner-desc {
        font-size: 15px;
    }

    .cta-contact-btn {
        padding: 13px 30px;
        font-size: 15px;
    }
}

.cta-banner-wrapper {
    margin-bottom: 60px;
}

</style>

@include('layouts.frontfooter')
