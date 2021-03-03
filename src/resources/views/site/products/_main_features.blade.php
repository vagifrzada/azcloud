<div class="main-features pb-16" id="main-features">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-8 offset-xl-2">
                <div class="features-slider ptb-16">
                    <div class="section-header">
                        <h2 class="section-title">@lang('products.features')</h2>
                    </div>

                    <div class="swiper-container">
                        <div class="swiper-wrapper">

                            @foreach($product->features as $feature)
                                <div class="feature-slide swiper-slide">
                                    <div class="feature-slide__bg">
                                        <img class="swiper-lazy" data-src="{{ optional($feature->getCover())->getUrl() }}" alt="Slide background">
                                    </div>
                                    <h3 class="feature-slide__label">{{ $feature->title }}</h3>
                                    <p class="feature-slide__info">
                                        {{ $feature->description }}
                                    </p>
                                </div>
                            @endforeach

                        </div>

                        <div class="swiper-pagination"> </div>

                        <div class="swiper-button-prev masked hidden-991">
                            <i class="icon-arrow-left"></i>
                        </div>
                        <div class="swiper-button-next masked hidden-991">
                            <i class="icon-arrow-right"></i>
                        </div>
                    </div>
                </div>
                <!-- Features slider-->

                @if(filled($addFeatures = array_filter($product->getAdditionalFeatures())))
                <div class="additional-features">
                    <div class="section-header">
                        <h2 class="section-title">@lang('products.additional_features')</h2>
                    </div>

                    <ul>
                        @foreach($addFeatures as $addFeature)
                            <li>{{ $addFeature }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <!-- Additional features-->
            </div>
        </div>
    </div>
</div>