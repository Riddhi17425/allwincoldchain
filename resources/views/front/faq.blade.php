@include('layouts.frontheader')

@php
    // NAYA FAQ ADD KARNA HO TO: neeche list ke end me ek aur ['q' => "...", 'a' => "..."], line jod do.
    // Accordion aur schema dono automatic update ho jayenge.
    $faqs = [
        ['q' => "What is cold chain packaging?", 'a' => "Cold chain packaging is designed to maintain the required temperature of temperature-sensitive products during storage and transportation. It uses insulated shippers, PCM chill pads, and temperature data loggers to help protect pharmaceuticals, vaccines, food, and laboratory samples."],
        ['q' => "How does temperature-controlled packaging work?", 'a' => "Temperature-controlled packaging combines insulated containers with coolants such as PCM chill pads or gel packs to maintain the required temperature range. The packaging system helps reduce heat transfer and protect products throughout the shipping journey."],
        ['q' => "What temperature ranges can cold chain packaging support?", 'a' => "Cold chain packaging can support different temperature ranges depending on the product requirements, insulation materials, and coolant configuration. Allwin's temperature-controlled packaging solutions can be selected according to the required shipping conditions and temperature hold duration."],
        ['q' => "How do I choose the right cold chain packaging solution?", 'a' => "Choose cold chain packaging based on your product's temperature range, shipment duration, transport distance, and environmental conditions. Allwin offers solutions such as single use packaging, reusable cold chain shippers, PCM chill pads, and temperature data loggers for different shipping needs."],
        ['q' => "Which products need cold chain packaging?", 'a' => "Cold chain packaging is commonly used for vaccines, pharmaceutical products, biologics, laboratory samples, diagnostic kits, food, and dairy products. These temperature-sensitive goods require suitable insulated packaging to help maintain product quality during transportation."],
        ['q' => "What is the difference between single use and reusable cold chain packaging?", 'a' => "Single use cold chain packaging is designed for one shipping journey, while reusable cold chain packaging can be used for multiple shipments with appropriate handling and maintenance. The right option depends on shipping frequency, return logistics, budget, and sustainability goals."],
        ['q' => "When should I choose single-use over reusable?", 'a' => "Single use cold chain packaging is suitable for one-way deliveries, international shipments, and locations where returning packaging is difficult. Reusable shippers may be more practical for regular shipping routes with established return logistics."],
        ['q' => "How long do shippers hold temperature?", 'a' => "The temperature-hold time of cold chain shippers depends on insulation performance, coolant quantity, ambient conditions, and the required temperature range. Allwin's insulated shipping solutions should be selected according to the shipment duration and validated thermal performance."],
        ['q' => "What is the difference between XPS and VIP shippers?", 'a' => "XPS (extruded polystyrene) shippers use rigid foam insulation to reduce heat transfer, while VIP (vacuum-insulated panel) shippers use vacuum-sealed panels for high insulation performance in a compact design. The best option depends on temperature-hold requirements, available space, and shipping conditions."],
        ['q' => "Can cold chain packaging be customized for specific shipping requirements?", 'a' => "Yes, cold chain packaging can be selected or configured according to product dimensions, temperature requirements, shipment duration, and transport conditions. Contact Allwin to discuss suitable insulated packaging solutions for your specific application."],
        ['q' => "What are PCM chill pads used for in cold chain packaging?", 'a' => "PCM (Phase Change Material) chill pads help maintain a specific temperature range by absorbing or releasing thermal energy during phase changes. They are used with insulated cold chain packaging to protect temperature-sensitive pharmaceutical, healthcare, food, and other products."],
        ['q' => "What is the difference between PCM chill pads and regular ice packs?", 'a' => "PCM chill pads are designed to work around a specific phase-change temperature, whereas regular ice packs generally rely on frozen water or gel to provide cooling. The appropriate choice depends on the required temperature range, shipment duration, and product sensitivity."],
        ['q' => "How long can the PCM ice packs last?", 'a' => "PCM chill pads can maintain their cooling or temperature-control effect for different durations depending on their formulation, quantity, conditioning, insulation, and external temperature. Their performance should be evaluated alongside the complete cold chain packaging system for the intended shipment."],
        ['q' => "Why use a data logger?", 'a' => "A cold chain temperature data logger records temperature readings during storage and transportation, helping businesses monitor shipment conditions. It supports temperature compliance checks, shipment traceability, and the investigation of potential temperature excursions."],
        ['q' => "Can temperature data loggers monitor humidity as well?", 'a' => "Yes, some temperature data loggers include humidity sensors to record both temperature and relative humidity during transportation. Allwin offers data logger options that can be selected according to your monitoring, documentation, and shipment requirements."],
        ['q' => "What cold chain packaging is suitable for vaccines and pharmaceutical products?", 'a' => "Vaccines and pharmaceutical products require cold chain packaging that supports their specified storage and transportation temperatures. Insulated shippers, suitable PCM chill pads, and temperature data loggers can help maintain and monitor shipment conditions when selected and validated appropriately."],
        ['q' => "How can cold chain packaging help protect laboratory samples?", 'a' => "Cold chain packaging helps protect laboratory samples by maintaining the required temperature during handling, storage, and transportation. Suitable insulated shippers, compatible coolants, and temperature monitoring devices can help preserve sample integrity throughout transit."],
        ['q' => "How do I choose packaging for long-distance or international cold chain shipments?", 'a' => "For long-distance or international shipments, consider transit time, customs delays, ambient temperatures, handling conditions, and the product's temperature requirements. Choose an insulated cold chain packaging system with appropriate coolants and validated hold time for the expected shipping conditions."],
        ['q' => "What is insulated cold chain packaging?", 'a' => "Insulated cold chain packaging uses materials such as XPS foam or vacuum-insulated panels (VIPs) to reduce heat transfer and help maintain a product's required temperature. It is commonly combined with PCM chill pads or other coolants to protect temperature-sensitive goods during transportation."],
        ['q' => "How do I select insulated packaging for long-distance shipping?", 'a' => "Select insulated packaging based on the required temperature range, expected transit duration, external climate, product size, and coolant configuration. Thermal performance testing can help determine whether the selected cold chain shipper is suitable for long-distance transportation."],
        ['q' => "How long can insulated packaging maintain the required temperature?", 'a' => "Insulated cold chain packaging can maintain the required temperature for several hours to multiple days, depending on the insulation material, coolant configuration, ambient conditions, and shipping duration. Thermal performance testing helps determine the suitable packaging solution for temperature-sensitive products."],
        ['q' => "Does Allwin provide support for cold chain packaging testing and validation?", 'a' => "Allwin can help you identify suitable cold chain packaging solutions based on your product and shipping requirements. Contact our team to discuss thermal performance testing, packaging validation requirements, and the available support for your temperature-controlled shipping needs."],
    ];

    // Schema isi $faqs array se banta hai, isliye page ke FAQs se hamesha match karega
    $faqSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => array_map(function ($faq) {
            return [
                '@type' => 'Question',
                'name' => $faq['q'],
                'acceptedAnswer' => ['@type' => 'Answer', 'text' => $faq['a']],
            ];
        }, $faqs),
    ];
@endphp

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


<div class="about4-section-area sp1">

  <div class="container">

    <div class="row align-items-center">

      <div class="col-lg-12">

        <div class="about-header-area heading9 text-center">

          <h2 class="Heading_h1" style="perspective: 400px;">Frequently Asked Questions About Cold Chain Packaging</h2>

          <p data-aos="fade-left" data-aos-duration="1000" class="aos-init aos-animate mb-3">Get answers to common questions about cold chain packaging, temperature-controlled shipping, reusable shippers, chill pads, and temperature data loggers with Allwin Cold Chain Solutions. Explore helpful information about our products, applications, and industry-specific solutions to choose the right packaging for your temperature-sensitive shipments.</p>

        </div>

      </div>


    </div>

  </div>

</div>

<!--faq-->
<div class="service-rightside-area heading2">
    <div class="container">
    <div class="faq-auhtor-area1 sp2">
        <div class="accordion accordion-flush active" id="accordionFlushExample">

                        <div class="accordion accordion-flush active" id="accordionFlushExample">

                @foreach($faqs as $i => $faq)
                <div class="accordion-item aos-init" data-aos="fade-left" data-aos-duration="800">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{ $i }}" aria-expanded="false" aria-controls="flush-collapse{{ $i }}">
                            {{ $faq['q'] }}
                        </button>
                    </h2>
                    <div id="flush-collapse{{ $i }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">{{ $faq['a'] }}</div>
                    </div>
                </div>
                <div class="space20"></div>
                @endforeach

            </div>

        </div>
    </div>
    </div>
</div>

{{-- FAQ Schema (auto-generated from $faqs) --}}
<script type="application/ld+json">
{!! json_encode($faqSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>

@include('layouts.frontfooter')
