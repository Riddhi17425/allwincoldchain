@include('layouts.frontheader')
<!--===== HERO AREA STARTS =======-->
<div class="hero1-section-area about-bg-area">
  <img src="{{asset('public/About-us images/'. $data->bg_image)}}" alt="{{$data->bg_image}}" class="header-img1">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 m-auto">
        <div class="hero-heading-area heading1 text-center">
          <h1>About us</h1>
          <a href="{{ url('/')}}" class="backline">Home <i class="fa-solid fa-angle-right"></i> <span>About us</span></a>
        </div>
      </div>
    </div>
  </div>
</div>
<!--===== HERO AREA ENDS =======-->
<!--===== ABOUT AREA STARTS =======-->
<div class="about1-section-area sp1">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="about-images-area">
          <div class="img1" data-aos="zoom-out" data-aos-duration="1000">
            <img src="{{asset('public/About-us images/'. $data->about_image)}}" alt="{{$data->about_image}}">
          </div>
          <!--<div class="img2" data-aos="zoom-out" data-aos-duration="1100">-->
          <!--  <img src="assets/img/all-images/about-img2.png" alt="">-->
          <!--</div>-->
          <!--<div class="conter-area" data-aos="zoom-out" data-aos-duration="1200">-->
          <!--  <h3><span class="counter">12</span>+</h3>-->
          <!--  <p>Years of Experienced</p>-->
          <!--</div>-->
        </div>
      </div>

      <div class="col-lg-6">
        <div class="about-header-area heading2">
          <h5>About Us</h5>
          <h2 class="tg-element-title">{{$data->title}}</h2>
          <p data-aos="fade-left" data-aos-duration="1000">{{$data->description}}</p>
          <div class="space10"></div>
          <ul id="dynamic-list">

          </ul>

        </div>
      </div>
    </div>
  </div>
</div>
<!--===== ABOUT AREA ENDS =======-->
<!--===== OTHERS AREA STARTS =======-->
<div class="mission-section-area sp1">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 m-auto">
        <div class="mission-header-area heading9 text-center">
          <h5 data-aos="fade-up" data-aos-duration="800">Shaping Tomorrow's Cold Chain</h5>
          <h2 class="tg-element-title">{{$data->wall_title}}</h2>
          <p data-aos="fade-up" data-aos-duration="1000"> {{$data->wall_desc}}</p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="tabs-auhtor-area">
          <ul class="nav nav-pills" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation" data-aos="zoom-in" data-aos-duration="800">
              <button class="nav-link active" id="pills-mission1-tab" data-bs-toggle="pill" data-bs-target="#pills-mission1" type="button" role="tab" aria-controls="pills-mission1" aria-selected="true">
                Our Mission
              </button>
            </li>
            <li class="nav-item" role="presentation" data-aos="zoom-in" data-aos-duration="1000">
              <button class="nav-link" id="pills-mission2-tab" data-bs-toggle="pill" data-bs-target="#pills-mission2" type="button" role="tab" aria-controls="pills-mission2" aria-selected="false">
                Our Vision
              </button>
            </li>
            <li class="nav-item" role="presentation" data-aos="zoom-in" data-aos-duration="1200">
              <button class="nav-link" id="pills-mission3-tab" data-bs-toggle="pill" data-bs-target="#pills-mission3" type="button" role="tab" aria-controls="pills-mission3" aria-selected="false">
                Our Goals
              </button>
            </li>
          </ul>
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-mission1" role="tabpanel" aria-labelledby="pills-mission1-tab" tabindex="0">
              <div class="row align-items-center">
                <div class="col-lg-6">
                  <div class="mission-img" data-aos="zoom-in" data-aos-duration="1000">
                    <img src="{{asset('public/About-us images/'. $data->missson_image)}}" alt="{{$data->missson_image}}">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mission-content-area heading10">
                    <h3 class="tg-element-title">{{$data->mission_title}}</h3>
                    <p data-aos="fade-left" data-aos-duration="900">{{$data->mission_desc}}</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="pills-mission2" role="tabpanel" aria-labelledby="pills-mission2-tab" tabindex="0">
              <div class="row align-items-center">
                <div class="col-lg-6">
                  <div class="mission-img">
                    <img src="{{asset('public/About-us images/'. $data->vision_image)}}" alt="{{$data->vision_image}}">

                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mission-content-area heading10">
                    <h3>{{$data->vision_title}}</h3>
                    <p>{{$data->vision_desc}}</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="pills-mission3" role="tabpanel" aria-labelledby="pills-mission3-tab" tabindex="0">
              <div class="row align-items-center">
                <div class="col-lg-6">
                  <div class="mission-img">
                    <img src="{{asset('public/About-us images/'. $data->goal_image)}}" alt="{{$data->goal_image}}">

                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mission-content-area heading10">
                    <h3>{{$data->goal_title}}</h3>
                    <p>{{$data->goal_desc}}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--===== OTHERS AREA ENDS =======-->
<div class="about3-section-area aboutpage-inner sp1">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-5">
        <div class="about3-header-area heading2">
          <h5>Who Are We</h5>
          <h2 class="tg-element-title" style="perspective: 400px;">{{$data->who_title}}</h2>
          <p>{{$data->who_desc}}</p>
          <div class="misson-text">
            <ul id="dynamic-key-point">

            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-1"></div>
      <div class="col-lg-6">
        <div class="about-images-area">
          <div class="row">
            <div class="col-lg-6 col-md-6">
              <div class="img1">
                <div class="space70 d-md-block d-none"></div>
                <div class="space30 d-md-none d-block"></div>
                <img src="{{asset('public/About-us images/'. $data->who_image_f)}}" alt="{{$data->who_image_f}}">

              </div>
            </div>
            <div class="col-lg-6 col-md-6">
              <div class="img1">
                <div class="space30 d-md-none d-block"></div>
                <img src="{{asset('public/About-us images/'. $data->who_image_s)}}" alt="{{$data->who_image_s}}">
                <div class="about-footer-bottom">
                  <div class="img">
                    <!--<img src="assets/img/icons/star1.svg" alt="">-->
                  </div>
                  <div class="content">
                    <span>Innovation. Precision. Sustainability</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@include('layouts.frontfooter')
<?php
$keyDescription = $data->key_description;
echo '<script>
        var keyDescriptionData = ' . json_encode($keyDescription) . ';
      </script>';
?>
<script>
  const parser = new DOMParser();
  const htmlDoc = parser.parseFromString(keyDescriptionData, 'text/html');

  const listItems = htmlDoc.querySelectorAll('li');
  const ulElement = document.getElementById('dynamic-list');

  listItems.forEach(item => {
    const li = document.createElement('li');

    li.innerHTML = `<img src="{{asset('/public/front/img/icons/check1.svg')}}" alt="check1">${item.innerHTML}`;

    ulElement.appendChild(li);

    const spaceLi = document.createElement('li');
    // spaceLi.className = 'space16';
    ulElement.appendChild(spaceLi);
  });
</script>

<?php
$keyDescription = $data->who_points;
echo '<script>
        var keyPointData = ' . json_encode($keyDescription) . ';
      </script>';
?>
<script>
  const Newparser = new DOMParser();
  const NewhtmlDoc = Newparser.parseFromString(keyPointData, 'text/html');

  const NewlistItems = NewhtmlDoc.querySelectorAll('li');
  const NewulElement = document.getElementById('dynamic-key-point');

  NewlistItems.forEach(item => {
    const li = document.createElement('li');

    li.innerHTML = `<img src="{{asset('/public/front/img/icons/check1.svg')}}" alt="check1">${item.innerHTML}`;

    NewulElement.appendChild(li);

    const NewspaceLi = document.createElement('li');
    // spaceLi.className = 'space16';
    NewulElement.appendChild(NewspaceLi);
  });
</script>