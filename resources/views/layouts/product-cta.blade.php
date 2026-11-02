@php
    $mode = $mode ?? 'banner';

    $ctaTitleHasContent = trim($tab['cta_title'] ?? '') !== '';
    $ctaDescHasContent  = trim(strip_tags($tab['cta_desc'] ?? '')) !== '';
    $ctaHasImage        = !empty($tab['cta_image']);
    $hasBanner          = $ctaTitleHasContent || $ctaDescHasContent;

    $btnUrl = trim($tab['cta_btn_url'] ?? '');
    if ($btnUrl === '') {
        $oldType = $tab['cta_btn_type'] ?? '';
        $btnUrl = $oldType === 'popup' ? '#contactPanel' : ($oldType === 'contact' ? '/contact-us' : '');
    }
    $btnText = trim($tab['cta_btn_text'] ?? '') !== '' ? $tab['cta_btn_text'] : 'Contact Us';

    $isHashBtn  = $btnUrl !== '' && $btnUrl[0] === '#';
    $hashTarget = $isHashBtn ? ltrim($btnUrl, '#') : '';
    $btnHref    = $isHashBtn
        ? rtrim(url('/'), '/') . '/#'
        : (preg_match('#^(https?:)?//|^mailto:|^tel:#i', $btnUrl) ? $btnUrl : url(ltrim($btnUrl, '/')));
    $showBtn    = $btnUrl !== '';
@endphp

@if($mode === 'banner' && $hasBanner)
<div class="container cta-banner-wrapper">
    <div class="cta-banner-area {{ $ctaHasImage ? 'has-bg' : '' }}">
        @if($ctaHasImage)
        <img src="{{ asset('public/product-images/' . $tab['cta_image']) }}"
             alt="{{ $tab['cta_image_alt'] ?? '' }}" class="cta-banner-bg" loading="lazy">
        @endif
        <div class="row align-items-center">
            <div class="col-lg-10 m-auto text-center" data-aos="fade-up" data-aos-duration="800">
                @if($ctaTitleHasContent)
                <h3 class="cta-banner-title">{{ $tab['cta_title'] }}</h3>
                @endif

                @if($ctaDescHasContent)
                <div class="cta-banner-desc">{!! $tab['cta_desc'] !!}</div>
                @endif

                @if($showBtn)
                <a href="{{ $btnHref }}" class="header-btn1 cta-white-btn {{ $isHashBtn ? 'js-cta-hash' : '' }}"
                   @if($isHashBtn) data-target="{{ $hashTarget }}" @endif
                   style="padding: 14px 40px; font-size: 16px; display: inline-block;">
                    {{ $btnText }} <i class="fa-solid fa-arrow-right" style="margin-left: 6px;"></i>
                </a>
                @endif
            </div>
        </div>
    </div>
</div>
@elseif($mode === 'button' && !$hasBanner && $showBtn)
<div class="cta-inline-btn">
    <a href="{{ $btnHref }}" class="header-btn1 {{ $isHashBtn ? 'js-cta-hash' : '' }}"
       @if($isHashBtn) data-target="{{ $hashTarget }}" @endif
       style="padding: 14px 40px; font-size: 16px; display: inline-block;">
        {{ $btnText }} <i class="fa-solid fa-arrow-right" style="margin-left: 6px;"></i>
    </a>
</div>
@endif
