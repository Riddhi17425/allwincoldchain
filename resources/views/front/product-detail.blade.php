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
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about-images-area aos-init aos-animate" data-aos="zoom-out" data-aos-duration="1000">
                    <div class="img1">
                        <img src="{{asset('public/product-images/'. $tab['image'])}}" alt="{{$tab['image']}}" class="header-img1">

                    </div>

                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-header-area heading4">
                    <h5 data-aos="fade-left" data-aos-duration="800" class="aos-init aos-animate">Why Choose Us</h5>
                    <h2 class="tg-element-title" style="perspective: 400px;">
                        {{ $tab['label'] }}
                    </h2>
                    <p data-aos="fade-left" data-aos-duration="1000" class="aos-init">{{ $tab['desc'] }}</p>
                    <div class="space40"></div>

                </div>
            </div>
        </div>
    </div>
</div>

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
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about-images-area aos-init aos-animate" data-aos="zoom-out" data-aos-duration="1000">
                    <div class="img1">
                        <img src="{{asset('public/product-images/'. $tab['image'])}}" alt="{{$tab['image']}}" class="header-img1">

                    </div>

                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-header-area heading4">
                    <h5 data-aos="fade-left" data-aos-duration="800" class="aos-init aos-animate">Why Choose Us</h5>
                    <h2 class="tg-element-title" style="perspective: 400px;">
                        {{ $tab['label'] }}
                    </h2>
                    <p data-aos="fade-left" data-aos-duration="1000" class="aos-init">{{ $tab['desc'] }}</p>
                    <div class="space40"></div>

                </div>
            </div>
        </div>
    </div>
</div>
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
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about-images-area aos-init aos-animate" data-aos="zoom-out" data-aos-duration="1000">
                    <div class="img1">
                        <img src="{{asset('public/product-images/'. $tab['image'])}}" alt="{{$tab['image']}}" class="header-img1">

                    </div>

                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-header-area heading4">
                    <h5 data-aos="fade-left" data-aos-duration="800" class="aos-init aos-animate">Why Choose Us</h5>
                    <h2 class="tg-element-title" style="perspective: 400px;">
                        {{ $tab['label'] }}
                    </h2>
                    <p data-aos="fade-left" data-aos-duration="1000" class="aos-init">{{ $tab['desc'] }}</p>
                    <div class="space40"></div>

                </div>
            </div>
        </div>
    </div>
</div>

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
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about-images-area aos-init aos-animate" data-aos="zoom-out" data-aos-duration="1000">
                    <div class="img1">
                        <img src="{{asset('public/product-images/'. $tab['image'])}}" alt="{{$tab['image']}}" class="header-img1">

                    </div>

                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-header-area heading4">
                    <h5 data-aos="fade-left" data-aos-duration="800" class="aos-init aos-animate">Why Choose Us</h5>
                    <h2 class="tg-element-title" style="perspective: 400px;">
                        {{ $tab['label'] }}
                    </h2>
                    <p data-aos="fade-left" data-aos-duration="1000" class="aos-init">{{ $tab['desc'] }}</p>
                    <div class="space40"></div>

                </div>
            </div>
        </div>
    </div>
</div>
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
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about-images-area aos-init aos-animate" data-aos="zoom-out" data-aos-duration="1000">
                    <div class="img1">
                        <img src="{{asset('public/product-images/'. $tab['image'])}}" alt="{{$tab['image']}}" class="header-img1">

                    </div>

                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-header-area heading4">
                    <h5 data-aos="fade-left" data-aos-duration="800" class="aos-init aos-animate">Why Choose Us</h5>
                    <h2 class="tg-element-title" style="perspective: 400px;">
                        {{ $tab['label'] }}
                    </h2>
                    <p data-aos="fade-left" data-aos-duration="1000" class="aos-init"> {!! $tab['desc'] !!}</p>
                    <div class="space40"></div>

                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endif






<!-- <div class="space32"></div> -->




@include('layouts.frontfooter')