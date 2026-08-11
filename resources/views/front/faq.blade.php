@include('layouts.frontheader')

<!--===== HERO AREA STARTS =======-->
<div class="hero1-section-area about-bg-area">
    <img src="{{asset('public/service-images/Service-detail-Banner.jpg')}}" alt="FAQ" class="header-img1">
    <div class="container">
      <div class="row">
        <div class="col-lg-7 m-auto">
          <div class="hero-heading-area heading1 text-center">
            <h1>Cold Chain Packaging FAQs</h1>
            <a href="{{ url('/')}}" class="backline">Home <i class="fa-solid fa-angle-right"></i><span>FAQ</span></a>
          </div>
        </div>
      </div>
    </div>
  </div>
<!--===== HERO AREA ENDS =======-->

<!--faq-->
<div class="service-rightside-area heading2">
    <div class="container">
    <div class="faq-auhtor-area1 sp2">
        <div class="accordion accordion-flush active" id="accordionFlushExample">
                        
                        <div class="accordion accordion-flush active" id="accordionFlushExample">
                                <div class="accordion-item aos-init" data-aos="fade-left" data-aos-duration="800">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse0" aria-expanded="false" aria-controls="flush-collapse0">
                            What is the primary difference between XPS and VIP boxes?
                        </button>
                    </h2>
                    <div id="flush-collapse0" class="accordion-collapse collapse show" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">XPS (Extruded Polystyrene) boxes are lightweight and affordable, suitable for short to medium-term shipments. VIP (Vacuum Insulated Panels) boxes offer higher insulation efficiency and are ideal for critical shipments requiring long-term temperature control.</div>
                    </div>
                </div>
                <div class="space20"></div>
                                <div class="accordion-item aos-init" data-aos="fade-left" data-aos-duration="800">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse1" aria-expanded="false" aria-controls="flush-collapse1">
                            How do PCM-based ice packs work?
                        </button>
                    </h2>
                    <div id="flush-collapse1" class="accordion-collapse collapse " data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">PCM (Phase Change Material) packs absorb and release thermal energy at specific temperatures, ensuring that your goods stay within the desired temperature range for extended periods.</div>
                    </div>
                </div>
                <div class="space20"></div>
                                <div class="accordion-item aos-init" data-aos="fade-left" data-aos-duration="800">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse2" aria-expanded="false" aria-controls="flush-collapse2">
                            Can I reuse the data loggers?
                        </button>
                    </h2>
                    <div id="flush-collapse2" class="accordion-collapse collapse " data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Yes, our data loggers are designed for reuse and can be reset after each shipment.</div>
                    </div>
                </div>
                <div class="space20"></div>
                                <div class="accordion-item aos-init" data-aos="fade-left" data-aos-duration="800">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse3" aria-expanded="false" aria-controls="flush-collapse3">
                            How long can the PCM ice packs last?
                        </button>
                    </h2>
                    <div id="flush-collapse3" class="accordion-collapse collapse " data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">The duration depends on the specific temperature range, but our PCM packs typically last 72 to 96 hours, depending on external conditions.</div>
                    </div>
                </div>
                <div class="space20"></div>
                                <div class="accordion-item aos-init" data-aos="fade-left" data-aos-duration="800">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse4" aria-expanded="false" aria-controls="flush-collapse4">
                            Do you offer custom packaging solutions?
                        </button>
                    </h2>
                    <div id="flush-collapse4" class="accordion-collapse collapse " data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Yes, we can customize our boxes, shippers, and PCM packs to meet specific customer requirements, whether it's for volume, temperature range, or transit time.</div>
                    </div>
                </div>
                <div class="space20"></div>
                            </div>
                        
        </div>
    </div>
    </div>
</div>



@include('layouts.frontfooter')