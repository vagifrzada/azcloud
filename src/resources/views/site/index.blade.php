@extends('layouts.site')

@section('meta_title', $meta['title'])
@section('meta_keywords', $meta['keywords'])
@section('meta_description', $meta['description'])

@php use App\Plugins\Page\PagePlugin; @endphp

@section('content')
    <section class="intro-slider">
        <div class="wave-texture bottom-right"></div>
        <div class="swiper-container" data-aos="fade-in" data-aos-duration="800">
            <div class="swiper-wrapper">
                @foreach($sliders as $slider)
                    <div class="swiper-slide no-swipe">
                        <div class="service-preview flex">
                            <div class="left">
                                <h1 class="title">{{ $slider->title }}</h1>
                                <h2 class="subtitle">{!! $slider->description !!}</h2>
                                <div class="actions">
                                    <a class="btn btn-primary" @if($slider->buy_link) target="_blank" @endif href="{{ $slider->buy_link ?? 'javascript:void(0)' }}">@lang('main.buy')</a>
                                    <a class="btn btn-outline" @if($slider->prices_link) target="_blank" @endif href="{{ $slider->prices_link ?? 'javascript:void(0)' }}">@lang('main.price_list')</a>
                                </div>
                            </div>
                            <div class="right">
                                <img src="{{ optional($slider->getCover())->getUrl() }}" alt="Service image">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Swiper wrapper-->

            <div class="pagination-wrapper flex">
                <div class="fraction">
                    <span class="current">1</span>
                    <span class="divider">/</span>
                    <span class="total">{{ count($sliders) }}</span>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
        <!-- Swiper container-->

        <button class="to-services hidden-1200">
            <img src="{{ asset('assets/site/images/icons/icon-angle-down.svg') }}" alt="Icon arrow down">@lang('main.our_services')
        </button>
    </section>
    <!-- Intro slider-->

    <section class="services-section">
        @if (filled($item = PagePlugin::getByIdentity(['identity' => 'services-standarts'])))
        <div class="services-heading">
            <div class="bg-video">
                <video class="lazy" autoplay muted loop playsinline>
                    <source data-src="{{ asset('assets/site/videos/network.mp4') }}" type="video/mp4">
                </video>
            </div>

            <div class="scrollable-x">
                <div class="left">
                    @foreach($item->getGallery() as $image)
                        <img src="{{ $image->getUrl() }}" alt="ISO standart">
                    @endforeach
                </div>
                <div class="right">
                    <img src="{{ asset('assets/site/images/azintelecom.svg') }}" alt="Azintelecom logo">
                </div>
            </div>
        </div>
        @endif

        @if (filled($servicesPage = PagePlugin::getByIdentity(['identity' => 'homepage-services'])))
            <div class="services-body ptb-14">
                 <div class="container-fluid">
                      <div class="row">
                         <div class="col-xl-8 offset-xl-2">
                           <div class="section-header">
                               <h2 class="section-title">{{ $servicesPage->getTitle() }}</h2>
                            </div>
                             @widget('ServicesWidget')
                         </div>
                      </div>
                </div>
           </div>
        @endif
    </section>
    <!-- Services-->

    @if (filled($item = PagePlugin::getByIdentity(['identity' => 'customers-block'])))
        <section class="clients ptb-14" data-aos="fade-in" data-aos-duration="800">
        <div class="bg-video">
            <video class="lazy" autoplay muted loop playsinline>
                <source data-src="{{ asset('assets/site/videos/network.mp4')  }}" type="video/mp4">
            </video>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 offset-xl-2">
                    <div class="section-header text-center">
                        <h2 class="section-title">{{ $item->getTitle() }}</h2>
                        <p class="subtitle">{{ $item->getDescription() }}</p>
                    </div>

                    <div class="clients-slider">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">

                                @foreach($item->getGallery() as $image)
                                <div class="swiper-slide">
                                    <a class="company-thumb" href="javascript::void(0)">
                                        <img src="{{ $image->getUrl() }}" alt="Client logo">
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
                    <!-- Clients slider-->
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- Clients-->

    @if (filled($item = PagePlugin::getByIdentity(['identity' => 'homepage-benefits'])))
    <section class="advantages ptb-14" data-aos="fade-in" data-aos-duration="800">
        <div class="wave-texture top-right"></div>
        <div class="wave-texture bottom-left"></div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 offset-xl-2">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="info">
                                <h2 class="section-title">{{ $item->getTitle() }}</h2>
                                <div class="desc">
                                    <p>{{ $item->getDescription() }}</p>
                                </div>
                            </div>
                        </div>
                        <!-- Col-->

                        <div class="col-md-6">
                            <div class="image">
                                <img src="{{ optional($item->getCover())->getUrl() }}" alt="Presentational image">
                            </div>
                        </div>
                        <!-- Col-->
                    </div>
                </div>
                <!-- Col-->
            </div>
        </div>

        <div class="swiper-container">
            <div class="swiper-wrapper">

                @foreach($item->children as $child)
                    <div class="swiper-slide">
                        <div class="advantage-block">
                            <div class="icon">
                                <img src="{{ optional($child->getCover())->getUrl() }}" alt="{{ $child->getTitle() }}">
                            </div>
                            <h3 class="title text-uppercase">{{ $child->getTitle() }}</h3>
                            <p class="subtitle">{!! strip_tags($child->getContent()) !!}</p>
                            <a class="read-more" href="{{ $child->getDescription() }}">@lang('main.see-more')</a>
                        </div>
                    </div>
                @endforeach
                <!-- Slide-->

            </div>
        </div>
        <!-- Advantages slider-->
    </section>
    @endif
    <!-- Advantages-->

    @if (filled($calculator = PagePlugin::getByIdentity(['identity' => 'homepage-calculator'])))
        @widget('CalculatorWidget', ['page' => $calculator])
    @endif

    @if (filled($item = PagePlugin::getByIdentity(['identity' => 'homepage-exposure-server'])))
    <div class="full-width-section ptb-16" data-aos="fade-in" data-aos-duration="800">
        <div class="bg-video">
            <video class="lazy" autoplay muted loop playsinline>
                <source src="{{ asset('assets/site/videos/switch.mp4') }}" type="video/mp4">
            </video>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 offset-xl-2">
                    <h3 class="section-title">{{ $item->getTitle() }}</h3>
                    <p class="subtitle">{{ $item->getDescription() }}</p>
                    <a class="btn btn-white" href="{{ route('site.contact') }}#contact-form">@lang('main.contact')</a>
                </div>
            </div>
        </div>
    </div>
    @endif
    <!-- Full width bg-->

    @if (filled($item = PagePlugin::getByIdentity(['identity' => 'homepage-testimonials'])))
        <section class="feedback-section pt-14">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 offset-xl-2">
                    <div class="section-header">
                        <h2 class="section-title">{{ $item->getTitle() }}</h2>
                    </div>

                    <div class="feedback-top">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">

                                @foreach($item->children as $child)
                                    <div class="swiper-slide">
                                        <div class="feedback">
                                            <div class="quote">
                                                {!! $child->getContent() !!}
                                            </div>
                                            <div class="quote-author flex">
                                                <div class="thumb">
                                                    <img src="{{ optional($child->getCover())->getUrl() }}" alt="Quote author">
                                                </div>
                                                <div class="info">
                                                    <p class="name">{{ $child->getTitle() }}</p>
                                                    <p class="he-is">{{ $child->getDescription() }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                    <!-- Feedback top-->
                </div>
            </div>
        </div>

        <div class="feedback-thumbs">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-8 offset-xl-2">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">

                                @foreach($item->children as $child)
                                <div class="swiper-slide">
                                    <div class="thumb">
                                        <img src="{{ optional($child->getCover())->getUrl() }}" alt="Quote author">
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Feedback thumbs-->
    </section>
    @endif
    <!-- Feedback-->

    @if (filled($dataCenters))
        <section class="data-centers ptb-14" data-aos="fade-in" data-aos-duration="800">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 offset-xl-2">
                    <div class="section-header">
                        <h2 class="section-title">@lang('main.data_centers')</h2>
                    </div>

                    <div class="row">
                        @foreach($dataCenters as $dataCenter)
                        <div class="col-md-6">
                            <div class="data-center-item">
                                <div class="image">
                                    <a href="{{ route('site.about') }}#data-centers">
                                        <img src="{{ optional($dataCenter->getCover())->getUrl() }}" alt="{{ $dataCenter->getTitle() }}">
                                    </a>
                                </div>
                                <div class="info">
                                    <a class="name" href="{{ route('site.about') }}#data-centers">{{ $dataCenter->getTitle() }}</a>
                                    <p class="desc">
                                        {{ $dataCenter->getDescription() }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- Data centres-->

    @widget('partners')

    @if (filled($latestPost))
    <section class="latest-blog ptb-14">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 offset-xl-2">
                    <div class="section-header text-center">
                        <h2 class="section-title">@lang('main.latest_post')</h2>
                    </div>

                    <div class="blog-article flex">
                        <div class="image masked">
                            <a href="{{ route('site.blog.show', ['slug' => $latestPost->getSlug()]) }}">
                                <img src="{{ optional($latestPost->getCover())->getUrl() }}" alt="{{ $latestPost->getTitle()  }}">
                            </a>
                        </div>
                        <div class="info">
                            <span class="date">{{ $latestPost->getCreatedAt()->format('d.m.Y') }}</span>
                            <a class="title" href="{{ route('site.blog.show', ['slug' => $latestPost->getSlug()]) }}">
                                {{ $latestPost->getTitle() }}
                            </a>
                            <div class="read-more">
                                <a href="{{ route('site.blog.show', ['slug' => $latestPost->getSlug()]) }}">@lang('posts.read-more')<i class="icon-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <a class="btn btn-block" href="{{ route('site.blog') }}">@lang('posts.all')</a>
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- Latest blog-->

   @include('site.partials.have-question')
@endsection