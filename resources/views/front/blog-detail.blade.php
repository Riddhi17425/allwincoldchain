@include('layouts.frontheader')

<!--===== HERO AREA STARTS =======-->
<div class="hero1-section-area about-bg-area">
    <img src="{{asset('public/front/img/bg/blog-banner.jpg')}}" alt="images blog detials" class="header-img1">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 m-auto">
          <div class="hero-heading-area heading1 text-center">
            <h1>{{ $blogsdetail->title }}</h1>
            <a href="{{ url('/') }}" class="backline d-none">Home <i class="fa-solid fa-angle-right"></i> Our Blog  </a>
            <!--<span>{{ $blogsdetail->title }}</span>-->
          </div>
        </div>
      </div>
    </div>
  </div>
<!--===== HERO AREA ENDS =======-->

<!--===== BLOG AREA STARTS =======-->
@if ($blogsdetail)
<div class="blog-leftside-section-area sp8">
    <div class="container">
       <p class="d-flex gap-2 align-items-center mb-4"><i class="fa-solid fa-calendar-days"></i>{{$blogsdetail->date}}</p>
        <div class="blog-leftside-area heading2 blog-singleside">
                    <div class="blog-left-heading heading2">
                        <div class="img1">
                            <img style="border-top:1px solid #f2f5f7;" src="{{ asset('public/blogs/detail_image/'. $blogsdetail->detail_image) }}" alt="{{  str_replace(['-', '_'],' ', pathinfo($blogsdetail->detail_image, PATHINFO_FILENAME)) }}">
                        </div>
                    </div>
                    <div class="space48"></div>
                    <div> {!! $blogsdetail->description !!}</div>
                    <!--<div class="left-heading2 heading2">-->
                    <!--    <h3>Electricity Services That Illuminate Your World:</h3>-->
                    <!--    <div class="space16"></div>-->
                    <!--    <p>Our team of experts is dedicated to delivering valuable content that empowers you to make informed decisions about your energy usage, while also showcasing the latest developments in the field. Whether you're a homeowner, business owner</p>-->
                    <!--    <div class="space16"></div>-->
                    <!--    <p>Passionate about sustainability, our blog has something for everyone. So, grab a cup of coffee, explore our articles, and join us on a journey to a brighter, more sustainable future.</p>-->
                    <!--</div>-->
                    <!--<div class="space48"></div>-->
                    <!--<div class="left-heading2 heading2">-->
                    <!--    <h3>Empower Your World: Unleash the Power</h3>-->
                    <!--    <div class="space16"></div>-->
                    <!--    <p>Welcome to our comprehensive electricity services blog, where we delve deep into the world of energy to bring you valuable insights, practical tips, and thought-provoking discussions. Our blog covers a diverse range of topics, from the latest advancements</p>-->
                    <!--    <div class="space16"></div>-->
                    <!--    <p>Whether you're interested in learning how to reduce your carbon footprint, exploring the benefits of solar power, or staying up-to-date with industry news and regulations, </p>-->
                    <!--</div>-->
                    <div class="space18"></div>
                    <div class="row">
                        <div class="co-12">
                            <div class="space30"></div>
                            <div class="img1">
                                <a href="{{ url('contact-us') }}" target="_blank"><img style="border-radius:4px;" class="w-100" src="{{ asset('public/blogs/cta_image/'.$blogsdetail->cta_image) }}" alt="{{  str_replace(['-', '_'],' ', pathinfo($blogsdetail->cta_image, PATHINFO_FILENAME)) }}"></a>
                            </div>
                        </div>
                        <!--<div class="col-lg-6 col-md-6">-->
                        <!--    <div class="space30"></div>-->
                        <!--    <div class="img1">-->
                        <!--        <img src="assets/img/all-images/blog-img25.png" alt="">-->
                        <!--    </div>-->
                        <!--</div>-->
                    </div>
                    <div class="space32"></div>
                    <p>{!! $blogsdetail->conclusion !!}</p>
                    <!--<p>With regular updates and new articles published, there's always something fresh and exciting to discover in our blog. So, whether you're a seasoned energy enthusiast or just starting your journey towards a greener future, join us as we explore</p>-->
                    
                </div>
    </div>
</div>
@endif
<!--===== BLOG AREA ENDS =======-->

@if(!empty($faqs) && is_array($faqs))

@php
    $faqItems = [];

    if (!empty($faqs)) {

        $decodedFaqItems = $faqs;

        if (is_array($decodedFaqItems)) {
            foreach ($decodedFaqItems as $item) {
                $question = trim(strip_tags($item['faq_title'] ?? ''));
                $answer = trim(strip_tags($item['faq_description'] ?? ''));

                if ($question && $answer) {
                    $faqItems[] = [
                        'question' => $question,
                        'answer' => $answer,
                    ];
                }
            }
        }
    }

    $faqSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => array_map(function ($item) {
            return [
                '@type' => 'Question',
                'name' => $item['question'],
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => $item['answer'],
                ],
            ];
        }, $faqItems),
    ];
@endphp

<div class="accoding my-5">
    <div class="container">
        <div class="col-lg-8 m-auto">
            <h2 class="text-center my-4">Frequently Asked Questions</h2>
            <div id="accordionExample">
                @foreach ($faqs as $index => $faq)
                <div class="mb-4">
                    <h4 class="according_head" 
                        data-bs-toggle="collapse" 
                        data-bs-target="#collapse{{ $index }}" 
                        aria-expanded="{{ $index == 0 ? 'true' : 'false' }}" 
                        aria-controls="collapse{{ $index }}">
                        {{ $faq['faq_title'] ?? 'No Title' }}
                    </h4>

                    <div id="collapse{{ $index }}" 
                         class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}" 
                         data-bs-parent="#accordionExample">
                        <div>
                            {!! $faq['faq_description'] ?? '' !!}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif

@if(!empty($faqItems))
    <script type="application/ld+json">
        {!! json_encode($faqSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
    </script>
@endif
<style>

.blog-leftside-section-area h2
{
    margin-top:34px;
}

p strong
{
  color: var(--ztc-text-text-3);
}

.blog-leftside-area ul
{
        /*margin: 12px 0;*/
        margin-bottom:12px 0;
    padding-left: 2rem;
}


.heading2 p{
    opacity: 100% !important;
}

.blog-leftside-area ul li
{
   list-style: disc;
         font-family: var(--ztc-family-font1);
    font-size: var(--ztc-font-size-font-s18);
    line-height: var(--ztc-font-size-font-s26);
    color: var(--ztc-text-text-4);
    margin-bottom: 7px;
    opacity: 100% !important;
}

.blog-leftside-area ul li::marker
{
    color: var(--ztc-text-text-2);
}




.according_head {
  cursor: pointer;
  display: flex;
  justify-content: space-between;
  align-items: center;
  font-size: 20px;
  position: relative;
  padding-right: 30px;
 background:var(--ztc-text-text-2);
  background: white;
  /* light gray */
  padding: 10px;
  border-radius: 5px;
      border: 1px solid var(--ztc-text-text-2);
      padding-right:40px;
}
 
.according_head[aria-expanded="true"] {
  background: var(--ztc-text-text-2);
  color: white;
}
 
.according_head::after {
  content: "+";
  font-family: "remixicon";
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  right: 10px;
  font-weight: bold;
}
 
/* When the collapse div next to the heading is visible (.show), change the icon */
.according_head[aria-expanded="true"]::after {
  content: "-";
  /* change any icon*/
  color: white;
}

.accordion-collapse
{
    margin-top:10px;
}

@media (max-width: 1601px) {
   .blog-leftside-section-area h2
{
  font-size: 32px;
    
    margin-bottom: 5px;
}

   .blog-leftside-section-area h3
{
         font-size: 24px;
        /* margin: 10px 0; */
        margin-top: 13px;
        margin-bottom: 7px;

}

.sp8 {
    padding: 60px 0 0;
}



}

@media (max-width: 1441px) {
    
.heading1 h1 {
    font-size: 38px;
    line-height: 46px;
}
}

@media (max-width: 768px) {
    
.heading1 h1 {
      font-size: 26px;
      line-height: 36px;
 }
 
     .blog-leftside-section-area h2 {
        font-size: 24px;
        line-height: 30px;
     }
     
         .blog-leftside-section-area h3 {
        font-size: 18px;
      
    }
    
    .according_head 
    {
        font-size:18px;
    }
 
}


</style>


  <!--===== BLOG AREA ENDS =======-->
@include('layouts.frontfooter')