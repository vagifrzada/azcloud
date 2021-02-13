<div class="clients ptb-14" data-aos="fade-in" data-aos-duration="800">
    <div class="bg-video">
        <video class="lazy" autoplay muted loop playsinline>
            <source data-src="{{ asset('assets/site/videos/network.mp4') }}" type="video/mp4">
        </video>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-8 offset-xl-2">
                <div class="section-header text-center">
                    <h2 class="section-title">@lang('main.partners')</h2>
                </div>

                <div class="partners-slider">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            @foreach($partners as $partner)
                                <div class="swiper-slide">
                                    <a class="company-thumb" title="{{ $partner->title }}" @if ($partner->link) href="{{ $partner->link  }}" target="_blank" @endif>
                                        <img src="{{ optional($partner->getCover())->getUrl() }}" alt="{{ $partner->title }}">
                                    </a>
                                </div>
                            @endforeach
                        </div>

                        <div class="swiper-pagination"></div>

                        <div class="swiper-button-prev masked hidden-991">
                            <i class="icon-arrow-left"></i>
                        </div>
                        <div class="swiper-button-next masked hidden-991">
                            <i class="icon-arrow-right"></i>
                        </div>
                    </div>
                </div>
                <!-- Partners slider-->
            </div>
        </div>
    </div>
</div>