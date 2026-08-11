@include('layouts.frontheader')

<style>
    .blog-content-area .learnmore 
    {
      
        transition: transform 0.3s ease;
    }
    
     .blog-content-area .learnmore:hover .fa-arrow-right
    {
      transform: rotate(0deg) !important;
  
    }
    
    .blogs_img
    {
      border-radius: 4px 4px 0 0;
      border-top:1px solid #f2f5f7;
    }
    
    
    
</style>

<!--===== HERO AREA STARTS =======-->
<div class="hero1-section-area about-bg-area">
    <img src="{{asset('public/front/img/bg/blog-banner.jpg')}}" alt="blogs image" class="header-img1">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 m-auto">
          <div class="hero-heading-area heading1 text-center">
            <h1>Our Blog</h1>
            <a href="{{ url('/')}}" class="backline">Home <i class="fa-solid fa-angle-right"></i> <span>Our Blog</span></a>
          </div>
        </div>
      </div>
    </div>
  </div>
<!--===== HERO AREA ENDS =======-->

<!--===== BLOG AREA ENDS =======-->
<div class="blog1-section-area sp1">
    <div class="container">
      <div class="row">
        @foreach($blogs as $blog)
        <div class="col-lg-4 col-md-6">
          <div class="blog-auhtor-boxarea">
            <div href="{{ route('blogdetail', ['url' => $blog->url]) }}" class="">
              <a href="{{ route('blogdetail', ['url' => $blog->url]) }}" target="_blank">
                  <img class="w-100 blogs_img" src="{{ asset('public/blogs/front_image/'.$blog->front_image) }}" alt="{{$blog->title}}">
              </a>
           </div>
            <div class="blog-position">
              <!--<a href="blog-single.html" class="heading">{{$blog->title}} </a>-->
             <div class="blog-content-area text-start">
              <ul class="justify-content-start">
                <li class="d-flex gap-2 align-items-center"><i class="fa-solid fa-calendar-days"></i>{{$blog->date}}</li>
                <!--<li><a href="#"><i class="fa-solid fa-tag"></i>Electricity Corner</a></li>-->
              </ul>
              <a href="{{ route('blogdetail', ['url' => $blog->url]) }}" target="_blank"><p>{{ $blog->title }}</p></a>
              <a href="{{ route('blogdetail', ['url' => $blog->url]) }}" target="_blank" class="learnmore">Learn more <i class="fa-solid fa-arrow-right"></i></a>
             </div>
            </div>
          </div>
        </div>
        @endforeach
        <!--<div class="col-lg-4 col-md-6">-->
        <!--  <div class="blog-auhtor-boxarea">-->
        <!--    <div class="img1">-->
        <!--      <img src="{{asset('public/front/img/all-images/blog-img2.png')}}" alt="blog-img2">-->
        <!--    </div>-->
        <!--    <div class="blog-position">-->
        <!--      <a href="blog-single.html" class="heading">Empowering Energy Dive into Our Electricity </a>-->
        <!--     <div class="blog-content-area">-->
        <!--      <ul>-->
        <!--        <li><a href="#"><i class="fa-solid fa-calendar-days"></i>April 2,2024</a></li>-->
        <!--        <li><a href="#"><i class="fa-solid fa-tag"></i>Electricity Corner</a></li>-->
        <!--      </ul>-->
        <!--      <p> From understanding our pricing plans to learning about our renewable</p>-->
        <!--      <a href="blog-single.html" class="learnmore">Learn more <i class="fa-solid fa-arrow-right"></i></a>-->
        <!--     </div>-->
        <!--    </div>-->
        <!--  </div>-->
        <!--</div>-->
  
        <!--<div class="col-lg-4 col-md-6">-->
        <!--  <div class="blog-auhtor-boxarea">-->
        <!--    <div class="img1">-->
        <!--      <img src="{{asset('public/front/img/all-images/blog-img3.png')}}" alt="blog-img3">-->
        <!--    </div>-->
        <!--    <div class="blog-position">-->
        <!--      <a href="blog-single.html" class="heading">Electricity Explained: Bloggin Power of Tomorrow</a>-->
        <!--     <div class="blog-content-area">-->
        <!--      <ul>-->
        <!--        <li><a href="#"><i class="fa-solid fa-calendar-days"></i>April 2,2024</a></li>-->
        <!--        <li><a href="#"><i class="fa-solid fa-tag"></i>Electricity Corner</a></li>-->
        <!--      </ul>-->
        <!--      <p>We're committed to ensuring that you have all the information you need.</p>-->
        <!--      <a href="blog-single.html" class="learnmore">Learn more <i class="fa-solid fa-arrow-right"></i></a>-->
        <!--     </div>-->
        <!--    </div>-->
        <!--  </div>-->
        <!--</div>-->

        <!--<div class="col-lg-4 col-md-6">-->
        <!--    <div class="blog-auhtor-boxarea">-->
        <!--      <div class="img1">-->
        <!--        <img src="{{asset('public/front/img/all-images/blog-img13.png')}}" alt="blog-img13">-->
        <!--      </div>-->
        <!--      <div class="blog-position">-->
        <!--        <a href="blog-single.html" class="heading">Eco-Electric Edits Your Source Energy News</a>-->
        <!--       <div class="blog-content-area">-->
        <!--        <ul>-->
        <!--          <li><a href="#"><i class="fa-solid fa-calendar-days"></i>April 2,2024</a></li>-->
        <!--          <li><a href="#"><i class="fa-solid fa-tag"></i>Electricity Corner</a></li>-->
        <!--        </ul>-->
        <!--        <p> So, grab a cup of coffee, explore our articles, and join us on a journey</p>-->
        <!--        <a href="blog-single.html" class="learnmore">Learn more <i class="fa-solid fa-arrow-right"></i></a>-->
        <!--       </div>-->
        <!--      </div>-->
        <!--    </div>-->
        <!--  </div>-->
        <!--  <div class="col-lg-4 col-md-6">-->
        <!--    <div class="blog-auhtor-boxarea">-->
        <!--      <div class="img1">-->
        <!--        <img src="{{asset('public/front/img/all-images/blog-img14.png')}}" alt="blog-img14">-->
        <!--      </div>-->
        <!--      <div class="blog-position">-->
        <!--        <a href="blog-single.html" class="heading">Empowerment Energy Unleash Your Potential</a>-->
        <!--       <div class="blog-content-area">-->
        <!--        <ul>-->
        <!--          <li><a href="#"><i class="fa-solid fa-calendar-days"></i>April 2,2024</a></li>-->
        <!--          <li><a href="#"><i class="fa-solid fa-tag"></i>Electricity Corner</a></li>-->
        <!--        </ul>-->
        <!--        <p>Our team of experts is dedicated to delivering valuable content that</p>-->
        <!--        <a href="blog-single.html" class="learnmore">Learn more <i class="fa-solid fa-arrow-right"></i></a>-->
        <!--       </div>-->
        <!--      </div>-->
        <!--    </div>-->
        <!--  </div>-->

        <!--  <div class="col-lg-4 col-md-6">-->
        <!--    <div class="blog-auhtor-boxarea">-->
        <!--      <div class="img1">-->
        <!--        <img src="{{asset('public/front/img/all-images/blog-img15.png')}}" alt="blog-img15">-->
        <!--      </div>-->
        <!--      <div class="blog-position">-->
        <!--        <a href="blog-single.html" class="heading">Voltage Views Illuminating Energy Perspectives</a>-->
        <!--       <div class="blog-content-area">-->
        <!--        <ul>-->
        <!--          <li><a href="#"><i class="fa-solid fa-calendar-days"></i>April 2,2024</a></li>-->
        <!--          <li><a href="#"><i class="fa-solid fa-tag"></i>Electricity Corner</a></li>-->
        <!--        </ul>-->
        <!--        <p>Dive into our blog to discover a wide range of topics, including energy</p>-->
        <!--        <a href="blog-single.html" class="learnmore">Learn more <i class="fa-solid fa-arrow-right"></i></a>-->
        <!--       </div>-->
        <!--      </div>-->
        <!--    </div>-->
        <!--  </div>-->

        <!--  <div class="col-lg-4 col-md-6">-->
        <!--    <div class="blog-auhtor-boxarea">-->
        <!--      <div class="img1">-->
        <!--        <img src="{{asset('public/front/img/all-images/blog-img16.png')}}" alt="blog-img16">-->
        <!--      </div>-->
        <!--      <div class="blog-position">-->
        <!--        <a href="blog-single.html" class="heading">Wired Wisdom: Insights from the Energy Experts</a>-->
        <!--       <div class="blog-content-area">-->
        <!--        <ul>-->
        <!--          <li><a href="#"><i class="fa-solid fa-calendar-days"></i>April 2,2024</a></li>-->
        <!--          <li><a href="#"><i class="fa-solid fa-tag"></i>Electricity Corner</a></li>-->
        <!--        </ul>-->
        <!--        <p>Our team of experts is committed to providing you with accurate,</p>-->
        <!--        <a href="blog-single.html" class="learnmore">Learn more <i class="fa-solid fa-arrow-right"></i></a>-->
        <!--       </div>-->
        <!--      </div>-->
        <!--    </div>-->
        <!--  </div>-->

        <!--  <div class="col-lg-4 col-md-6">-->
        <!--    <div class="blog-auhtor-boxarea">-->
        <!--      <div class="img1">-->
        <!--        <img src="{{asset('public/front/img/all-images/blog-img17.png')}}" alt="blog-img17">-->
        <!--      </div>-->
        <!--      <div class="blog-position">-->
        <!--        <a href="blog-single.html" class="heading">Bright Ideas: Unveiling Energy Innovations</a>-->
        <!--       <div class="blog-content-area">-->
        <!--        <ul>-->
        <!--          <li><a href="#"><i class="fa-solid fa-calendar-days"></i>April 2,2024</a></li>-->
        <!--          <li><a href="#"><i class="fa-solid fa-tag"></i>Electricity Corner</a></li>-->
        <!--        </ul>-->
        <!--        <p>With regular updates and new articles published, there's always something</p>-->
        <!--        <a href="blog-single.html" class="learnmore">Learn more <i class="fa-solid fa-arrow-right"></i></a>-->
        <!--       </div>-->
        <!--      </div>-->
        <!--    </div>-->
        <!--  </div>-->

        <!--  <div class="col-lg-4 col-md-6">-->
        <!--    <div class="blog-auhtor-boxarea">-->
        <!--      <div class="img1">-->
        <!--        <img src="{{asset('public/front/img/all-images/blog-img18.png')}}" alt="blog-img18">-->
        <!--      </div>-->
        <!--      <div class="blog-position">-->
        <!--        <a href="blog-single.html" class="heading">Spark Solutions: Exploring Energy Innovations</a>-->
        <!--       <div class="blog-content-area">-->
        <!--        <ul>-->
        <!--          <li><a href="#"><i class="fa-solid fa-calendar-days"></i>April 2,2024</a></li>-->
        <!--          <li><a href="#"><i class="fa-solid fa-tag"></i>Electricity Corner</a></li>-->
        <!--        </ul>-->
        <!--        <p>So, whether you're a seasoned energy enthusiast or just starting</p>-->
        <!--        <a href="blog-single.html" class="learnmore">Learn more <i class="fa-solid fa-arrow-right"></i></a>-->
        <!--       </div>-->
        <!--      </div>-->
        <!--    </div>-->
        <!--  </div>-->

          
      </div>
    </div>
  </div>
  <!--===== BLOG AREA ENDS =======-->

  @include('layouts.frontfooter')