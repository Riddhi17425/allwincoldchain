@include('layouts.frontheader')

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

@php
    $tableData = json_decode($data->table_details ?? '[]', true);
    if (!is_array($tableData)) {
        $tableData = [];
    }
@endphp

@foreach($tableData as $index => $tab)

@php
    $secHasLabel = trim($tab['label'] ?? '') !== '';
    $secHasDesc  = trim(strip_tags($tab['desc'] ?? '', '<img><table>')) !== '';
    $hasSection  = $secHasLabel || $secHasDesc || !empty($tab['image']);
@endphp

@if($hasSection)
<div class="about2-section-area sp1 {{ empty($tab['image']) ? 'content-only-section' : '' }}">
    <div class="container">
        <div class="row align-items-center {{ !empty($tab['image']) && $index % 2 != 0 ? 'flex-row-reverse' : '' }}">
            @if(!empty($tab['image']))
            <div class="col-lg-6">
                <div class="about-images-area aos-init aos-animate" data-aos="zoom-out" data-aos-duration="1000">
                    <div class="img1">
                        <img src="{{asset('public/product-images/'. $tab['image'])}}" alt="{{ $tab['alt'] ?? $tab['image'] }}" class="header-img1">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-header-area heading4">
                    @if($secHasLabel)
                    <h2 class="tg-element-title" style="perspective: 400px;">
                        {{ $tab['label'] }}
                    </h2>
                    @endif
                    <div data-aos="fade-left" data-aos-duration="1000" class="aos-init">{!! $tab['desc'] ?? '' !!}</div>
                    @include('layouts.product-cta', ['tab' => $tab, 'mode' => 'button'])
                </div>
            </div>
            @else
            <div class="col-lg-12">
                <div class="about-header-area heading4 text-center">
                    @if($secHasLabel)
                    <h2 class="tg-element-title" style="perspective: 400px;">
                        {{ $tab['label'] }}
                    </h2>
                    @endif
                    <div class="content-only-body">{!! $tab['desc'] ?? '' !!}</div>
                    @include('layouts.product-cta', ['tab' => $tab, 'mode' => 'button'])
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endif

@php
    $tableHasContent = trim(strip_tags($tab['table_html'] ?? '', '<table>')) !== '';
@endphp
@if($tableHasContent)
<div class="my-5">
    <div class="container table-responsive">
        {!! $tab['table_html'] !!}
    </div>
</div>
@endif

@include('layouts.product-cta', ['tab' => $tab, 'mode' => 'banner'])

@if(!$hasSection)
@include('layouts.product-cta', ['tab' => $tab, 'mode' => 'button'])
@endif

@if($data->prod_url == 'reusable-cold-chain-shippers' && $index == 0)
<h2 class="tg-element-title text-center" style="font-size:42px">Made to Order and Standard Size Available</h2>
@endif

@endforeach


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
.faq-heading-wrap { margin-bottom: 24px; }
.faq-main-title { font-size: 32px !important; font-weight: 700; color: #0b1f3a; }
.faq-custom-wrap { max-width: 900px; margin: 0 auto; padding-bottom: 60px; }
.faq-custom-item { background: #f5f7f9; border: none !important; border-radius: 10px; margin-bottom: 14px; overflow: hidden; transition: box-shadow 0.2s ease; }
.faq-custom-item:hover { box-shadow: 0 4px 14px rgba(0, 0, 0, 0.06); }
.faq-custom-button { background: transparent !important; color: #0b1f3a !important; font-weight: 600; font-size: 16px; padding: 18px 22px; box-shadow: none !important; border: none !important; }
.faq-custom-button:not(.collapsed) { color: #0077b6 !important; }
.faq-custom-button:focus { box-shadow: none !important; border-color: transparent !important; }
.faq-custom-button::after { background-image: url("data:image/svg+xml,%3csvg xmlns='http://www\.w3.org/2000/svg' width='16' height='16' fill='%230b1f3a' viewBox='0 0 16 16'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e"); }
.faq-custom-body { padding: 0 22px 18px 22px; color: #5a6472; font-size: 15px; line-height: 1.6; }
@media (max-width: 768px) {
    .faq-main-title { font-size: 24px !important; }
    .faq-custom-button { font-size: 15px; padding: 14px 16px; }
}
</style>
@endif

<style>
.about-header-area ul { list-style: disc; padding-left: 20px; margin-bottom: 15px; }
.about-header-area ul li { list-style: disc; margin-bottom: 8px; }
.about-header-area ol { list-style: decimal; padding-left: 20px; margin-bottom: 15px; }
.about-header-area ol li { list-style: decimal; margin-bottom: 8px; }

.content-only-body { max-width: 100%; margin: 15px 0 0; text-align: left; color: #5a6472; font-size: 16px; line-height: 1.75; }
.content-only-body ul, .content-only-body ol { padding-left: 20px; margin-bottom: 0; }
.content-only-body ul li, .content-only-body ol li { margin-bottom: 8px; }

.about2-section-area.sp1 { padding: 40px 0; }
.about2-section-area.sp1.content-only-section { padding: 15px 0; }
.about-header-area p, .content-only-body p { margin-bottom: 10px; }
.content-only-body > :last-child, .about-header-area .aos-init > :last-child { margin-bottom: 0; }

.cta-banner-area .row > div { display: flex; flex-direction: column; align-items: center; gap: 18px; }
.cta-banner-area { position: relative; overflow: hidden; background-color: #0077b6; border: none; border-radius: 20px; padding: 30px 35px; text-align: center; }
.cta-banner-bg { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; z-index: 0; }
.cta-banner-area.has-bg::before { content: ""; position: absolute; inset: 0; background: rgba(0,119,182,.82); z-index: 1; }
.cta-banner-area > .row { position: relative; z-index: 2; }
.cta-banner-title { color: #ffffff; font-size: 22px; font-weight: 700; margin-bottom: 0; }
.cta-banner-desc { color: #e9ecef; font-size: 16px; line-height: 1.6; margin-bottom: 0; }
.cta-white-btn { background-color: #ffffff !important; color: #0077b6 !important; border: none !important; }
.cta-white-btn:hover { background-color: #0056b3 !important; color: #ffffff !important; }
.cta-banner-wrapper { margin-bottom: 60px; }

.cta-inline-btn { margin-top: 30px; }

.table-responsive table { width: 100%; border-collapse: collapse; margin-bottom: 0; }
.table-responsive table th, .table-responsive table td { padding: 8px 10px !important; border: 1px solid #dee2e6 !important; vertical-align: top; text-align: left; }
.table-responsive table p { margin: 0; }
.table-responsive table .ct-title-row > * { background-color: #0077b6 !important; color: #ffffff !important; text-align: center !important; font-weight: 700; }
.table-responsive table .ct-head-row > * { background-color: #eff9ff !important; font-weight: 700; vertical-align: bottom; }
.table-responsive table .ct-head-row > :first-child { width: 25%; }

@media (max-width: 768px) {
    .cta-banner-area { padding: 22px 20px; border-radius: 15px; }
    .cta-banner-title { font-size: 19px; }
    .cta-banner-desc { font-size: 15px; }
}
</style>


@php
    $productSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'Product',
        'name' => trim(strip_tags($data->title ?? '')),
        'url' => url()->current(),
    ];

    $productImages = [];
    foreach ($tableData as $tab) {
        if (!empty($tab['image'])) {
            $productImages[] = asset('public/product-images/' . $tab['image']);
        }
    }
    if (!empty($productImages)) {
        $productSchema['image'] = array_values(array_unique($productImages));
    }

    $productDescription = trim(preg_replace('/\s+/', ' ', html_entity_decode(strip_tags($data->meta_description ?? ''), ENT_QUOTES | ENT_HTML5, 'UTF-8')));
    if ($productDescription !== '') {
        $productSchema['description'] = $productDescription;
    }

    $productSchema['brand'] = [
        '@type' => 'Brand',
        'name' => 'Allwin Cold Chain Solutions Pvt. Ltd.',
    ];

    $productSchema['aggregateRating'] = [
        '@type' => 'AggregateRating',
        'ratingValue' => '5',
        'bestRating' => '5',
        'worstRating' => '0',
        'ratingCount' => '5',
    ];
@endphp

@if(!empty($productSchema['name']))
<script type="application/ld+json">
{!! json_encode($productSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT) !!}
</script>
@endif

<script>
document.addEventListener("click", function (e) {
    var link = e.target.closest("a.js-cta-hash");
    if (!link) return;
    e.preventDefault();
    var id = link.getAttribute("data-target") || "";
    if (id === "contactPanel" && typeof openContactPanel === "function") {
        openContactPanel();
        return;
    }
    var el = id ? document.getElementById(id) : null;
    if (el) el.scrollIntoView({ behavior: "smooth" });
});

document.addEventListener("DOMContentLoaded", function () {
    var strip = ["style", "width", "height", "bgcolor", "align", "valign"];
    document.querySelectorAll(".table-responsive table").forEach(function (table) {
        [table].concat(Array.prototype.slice.call(table.querySelectorAll("*"))).forEach(function (node) {
            strip.forEach(function (attr) { node.removeAttribute(attr); });
        });

        var rows = table.querySelectorAll("tr");
        if (!rows.length) return;

        var index = 0;
        var cells = rows[0].children;
        var span = cells.length ? (parseInt(cells[0].getAttribute("colspan"), 10) || 1) : 1;
        if (cells.length === 1 && span > 1 && rows.length > 1) {
            rows[0].classList.add("ct-title-row");
            index = 1;
        }
        if (rows[index]) rows[index].classList.add("ct-head-row");
    });
});
</script>

@include('layouts.frontfooter')
