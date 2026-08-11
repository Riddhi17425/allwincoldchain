@include('layouts.frontheader')
<div class="hero1-section-area about-bg-area">
    <img src="{{asset('public/industry-images/'. $data->industry_header_image)}}" alt="{{$data->industry_header_image}}" class="header-img1">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 m-auto">
                <div class="hero-heading-area heading1 text-center">
                    <h1>{{$data->title}}</h1>
                    <a href="{{ url('/')}}" class="backline">Home
                        <i class="fa-solid fa-angle-right"></i><span>{{$data->title}}</span>
                    </a>
                </div> 
            </div>
        </div>
    </div>
</div>
<div class="work1-section-area sp1">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="work-header-area heading2">
                    <h5 data-aos="fade-left" data-aos-duration="800" class="aos-init aos-animate">How it works</h5>
                    <!-- <h2 class="tg-element-title" style="perspective: 400px;">{{$data->work_title}}</h2> -->
                    <h2 class="tg-element-title" style="perspective: 400px;">{{$data->heading}}</h2>
                    <p data-aos="fade-left" data-aos-duration="1000" class="aos-init">{{$data->work_desc}}</p>

                    <div class="tabs-list">
                        @php
                        $workTabData = json_decode($data->work_tab_data, true);
                        @endphp
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            @foreach($workTabData as $index => $tab)
                            <li class="nav-item aos-init" role="presentation" data-aos="fade-left" data-aos-duration="{{800 + ($index * 200)}}">
                                <button class="nav-link @if($index == 0) active @endif" id="pills-work{{$index + 1}}-tab" data-bs-toggle="pill" data-bs-target="#pills-work{{$index + 1}}" type="button" role="tab" aria-controls="pills-work{{$index + 1}}" aria-selected="{{ $index == 0 ? 'true' : 'false' }}">
                                    <span class="workicons">
                                        <img src="{{asset('public/industry-images/'. $tab['work_tab_icons']) }}"  alt="{{$tab['work_tab_icons']}}"></span>
                                    <span class="worktext">{{ $tab['work_tab_label'] }}</span>
                                </button>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="works-author-area">
                    <div class="tab-content" id="pills-tabContent">
                        @foreach($workTabData as $index => $tab)
                        <div class="tab-pane fade @if($index == 0) show active @endif" id="pills-work{{$index + 1}}" role="tabpanel" aria-labelledby="pills-work{{$index + 1}}-tab" tabindex="0">
                            <div class="works-side-area">
                                <div class="images">
                                    <img src="{{asset('public/industry-images/'. $tab['work_tab_images']) }}" alt="{{$tab['work_tab_images']}}">
                                </div>
                                <div class="content-area">
                                    <p>{{ $tab['work_tab_desc'] }}</p>
                                    <div class="btn-area">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- how it works -->

<!--===== CASE STUDY AREA STARTS =======-->
<div class="service-leftside-area sp8">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="service-rightside-area heading2" style="padding: 0;">
                    <div class="img1">
                        <img src="{{asset('public/industry-images/'.$data->wall_image);}}" alt="{{$data->wall_image}}">
                    </div>

                    @php
                    $wallTitlDescData= json_decode($data->wall_title_description, true);
                    @endphp
                    @foreach($wallTitlDescData as $index => $td)
                    <div class="space32"></div>
                    <h3>{{$td['wall_title']}}</h3>
                    <p>{{$td['wall_description']}}</p>
                    @endforeach

                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="space32"></div>
                            <div class="img1">
                                <img src="{{asset('public/industry-images/'.$data->key_image)}}" alt="{{$data->key_image}}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="space32"></div>
                            <div class="img1">
                                <ul id="dynamic-list">

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="space32"></div>
                    <div class="faq-auhtor-area1 sp2">

                        @if(isset($dataFaq) && $dataFaq->title_description)
                        @php
                        $questions = json_decode($dataFaq->title_description, true);
                        @endphp

                        @if(!empty($questions))
                        <div class="accordion accordion-flush active" id="accordionFlushExample">
                            @foreach ($questions as $index => $item)
                            <div class="accordion-item" data-aos="fade-left" data-aos-duration="800">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{ $index }}" aria-expanded="false" aria-controls="flush-collapse{{ $index }}">
                                        {{ $item['title'] }}
                                    </button>
                                </h2>
                                <div id="flush-collapse{{ $index }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">{{ $item['description'] }}</div>
                                </div>
                            </div>
                            <div class="space20"></div>
                            @endforeach
                        </div>
                        @endif
                        @endif

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
        spaceLi.className = 'space16';
        ulElement.appendChild(spaceLi);
    });
</script>