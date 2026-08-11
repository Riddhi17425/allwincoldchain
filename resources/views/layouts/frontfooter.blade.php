<!--===== FOOTER AREA STARTS =======-->
<div class="footer1-section-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="footer-logo-content sp4">
          <div class="row">
            <div class="col-lg-3 col-md-6">
              <div class="logo-content">
                <img src="{{asset('public/front/img/logo/footer-logo.svg')}}" alt="Footer Logo" class="footer-logo">
             
              </div>
              <div class="logo-content">
                <ul>
                    <li class="text-white">We're more than just a provider of cold chain solutions – we're pioneers in the industry, committed to ensuring the safe and reliable transport of temperature-sensitive goods across the globe.
                    </li>
                  <!--<li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>-->
                  <!--<li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>-->
                  <!--<li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>-->
                  <!--<li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>-->
                </ul>
              </div>
            </div>
            <!--<div class="col-lg-1 d-lg-block d-none"></div>-->
            <div class="col-lg-2 col-md-6">
              @php
              $industries = DB::table('industry')->where('is_check','0')->where('is_delete','0')->get();
              
              $services = DB::table('service')->where('is_delete','0')->get();
              $product = DB::table('product')->where('is_delete','0')->get();
              @endphp
              <div class="space30 d-block d-md-none"></div>
              <div class="service-heading">
                <h2>Links</h2>
                <ul>
                  <li>
                    <a href="{{route('/')}}">Home</a>
                  </li>
                  <li>
                    <a href="{{ route('about-us.show')}}">About</a>
                  </li>
                  <li>
                    <a href="{{ route('faq')}}">FAQ's</a>
                  </li>
                  <li>
                    <a href="{{ route('blog')}}">Blog</a>
                  </li>
                  <li>
                    <a href="{{route('contact')}}">Contact</a>
                  </li>
                </ul>
              </div>
              <!--<div class="service-heading mt-4">-->
              <!--  <h2>Products</h2>-->
              <!--  <ul>-->
              <!--    @foreach ($product as $products)-->
              <!--    <li>-->
              <!--      <a href="{{ route('products.show', ['prod_url' => $products->prod_url]) }}">{{ $products->product_header }}</a>-->
              <!--    </li>-->
              <!--    @endforeach-->
              <!--  </ul>-->
              <!--</div>-->
            </div>

            <!-- <div class="col-lg-1 d-lg-block d-none"></div> -->
            <div class="col-lg-2 col-md-6">
              <div class="space30 d-md-block d-lg-none"></div>
              <div class="service-heading">
                <h2>Industries</h2>
                <ul>
                  @foreach ($industries as $industry)
                  <li>
                    <a href="{{ route('industries.show', ['ind_url' => $industry->ind_url]) }}">{{ $industry->industry_header }}</a>
                  </li>
                  @endforeach
                </ul>
              </div>
            </div>

            <!--<div class="col-lg-4 col-md-6">-->
            <!--  <div class="space30 d-md-block d-lg-none"></div>-->

            <!--  <div class="service-heading">-->
            <!--    <h2>Service</h2>-->
            <!--    <ul>-->
            <!--      @foreach ($services as $service)-->
            <!--      <li>-->
            <!--        <a href="{{ route('services.show', ['ser_url' => $service->ser_url]) }}">{{ $service->service_header }}</a>-->
            <!--      </li>-->
            <!--      @endforeach-->
            <!--    </ul>-->
            <!--  </div>-->
            <!--</div>-->
            <div class="col-lg-2 col-md-6">
              <!--<div class="space30 d-md-block d-lg-none"></div>-->
              <div class="service-heading">
                <h2>Products</h2>
                <ul>
                  @foreach ($product as $products)
                  <li>
                    <a href="{{ route('products.show', ['prod_url' => $products->prod_url]) }}">{{ $products->product_header }}</a>
                  </li>
                  @endforeach
                </ul>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <!--<div class="logo-content">-->
              <!--  <img src="{{asset('public/front/img/logo/footer-logo.svg')}}" alt="" class="footer-logo">-->
              <!--</div>-->
              <div class="service-heading contact">
                <ul>
                  <li><a href="https://maps.app.goo.gl/DRvQKFSc62bEANK46">
                      <span class="icons"><i class="fa-solid fa-location-dot" style="margin:0 9px;"></i></span><span>Survey No. NA/1466, Plot No. 15, Opp. Mayur Wovens.,
                        Khatraj-Kalol- Road, Moti-Bhoyan -382721 Dist. Gandhinagar., Gujarat - INDIA.</span></a>
                  </li>
                  <li><a href="tel:+919687640805">
                      <span class="icons"><i class="fa-solid fa-phone"></i></span><span>+91 96876 40805</span></a>
                  </li>
                  <li><a href="mailto:Sales@allwincoldchainsolutions.com">
                      <span><span class="icons"><i class="fa-solid fa-envelope"></i></span></span>
                      <span style=" word-break: break-word; ">Sales@allwincoldchainsolutions.com</span></a>
                  </li>
                </ul>
              </div>
              <div class="logo-content">
                <ul>
                  <li><a target="_blank" href="https://www.facebook.com/allwincoldchainsolutions"><i class="fa-brands fa-facebook-f"></i></a></li>
                  <li><a target="_blank" href="https://www.instagram.com/allwincoldchain/"><i class="fa-brands fa-instagram"></i></a></li>
                  <li><a target="_blank" href="https://www.linkedin.com/company/allwin-cold-chain-solutions/"><i class="fa-brands fa-linkedin-in"></i></a></li>
                  <!--<li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>-->
                </ul>
              </div>
            </div>
            
          </div>
        </div>
        <div class="copyright">
          <p>© Copyright {{ date('Y') }} Allwin. All Right Reserved</p>
        </div>
      </div>
    </div>
  </div>
</div>
<!--===== FOOTER AREA ENDS =======-->
@include('layouts.whatsapp')


<!--===== JS SCRIPT LINK =======-->
<script src="{{ asset('public/front/js/plugins/bootstrap.min.js')}}"></script>
<script src="{{ asset('public/front/js/plugins/fontawesome.js')}}"></script>
<script src="{{ asset('public/front/js/plugins/aos.js')}}"></script>
<script src="{{ asset('public/front/js/plugins/ScrollTrigger.min.js')}}"></script>
<script src="{{ asset('public/front/js/plugins/mobilemenu.js')}}"></script>
<script src="{{ asset('public/front/js/plugins/owlcarousel.min.js')}}"></script>
<script src="{{ asset('public/front/js/main.js')}}"></script>
<!--cache clear js-->
<script>
    function clearBrowserCache() {
    // Clear localStorage
    localStorage.clear();
    
    // Clear sessionStorage
    sessionStorage.clear();
    
    // Clear cookies
    const cookies = document.cookie.split(';');
    for (let i = 0; i < cookies.length; i++) {
        const cookie = cookies[i];
        const eqPos = cookie.indexOf('=');
        const name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
        document.cookie = name + '=;expires=Thu, 01 Jan 1970 00:00:00 GMT;path=/';
    }
    
    // Reload page without cache
    window.location.reload(true);
}

// Add event listener for page reload
window.addEventListener('beforeunload', clearBrowserCache);
</script>
<!--cache clear js--> 
</body>
</html>