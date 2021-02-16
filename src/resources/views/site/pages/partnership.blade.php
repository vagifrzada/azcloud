@extends('layouts.site')

@php use App\Plugins\Page\PagePlugin; @endphp

@section('meta_title', $meta['title'])
@section('meta_keywords', $meta['keywords'])
@section('meta_description', $meta['description'])

@section('content')

    <section class="page">
        @if (filled($partnership = PagePlugin::getByIdentity(['identity' => 'partnership'])))
        <div class="partnership-intro" data-aos="fade-in" data-aos-duration="800">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-8 offset-xl-2">
                        <div class="page-header">
                            <h1 class="page-title">{{ $partnership->getTitle() }}</h1>
                            <p class="subtitle">{{ $partnership->getDescription() }}</p>
                            <div class="actions">
                                <a class="btn btn-primary btn-block" href="#prices">@lang('main.plans')</a>
                                <a class="btn btn-outline btn-block" href="#advantages">@lang('main.advantages')</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <!-- Partnership intro-->

        @if (filled($item = PagePlugin::getByIdentity(['identity' => 'partnership-advantages'])))
        <div class="partnership-advantages ptb-11" data-aos="fade-in" data-aos-duration="800" id="advantages">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-8 offset-xl-2">
                        <div class="section-header flex">
                            <h2 class="section-title">{{ $item->getTitle() }}</h2>
                            <div class="controls flex">
                                <div class="swiper-button-prev masked hidden-991">
                                    <i class="icon-arrow-left"></i>
                                </div>
                                <div class="swiper-button-next masked hidden-991">
                                    <i class="icon-arrow-right"> </i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach($item->children as $child)
                    <div class="swiper-slide">
                        <div class="advantage-item">
                            <p class="title">{{ $child->getTitle() }}:</p>
                            {!! $child->getContent() !!}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- Advantages slider-->
        </div>
        @endif
        <!-- Partnership advantages-->

        @if (filled($item = PagePlugin::getByIdentity(['identity' => 'system-integrator'])))
        <div class="partnership-types" id="prices">
            <div class="container-fluid ptb-11" data-aos="fade-up" data-aos-duration="800">
                <div class="row">
                    <div class="col-xl-8 offset-xl-2">
                        <div class="section-header">
                            <h2 class="section-title">{{ $item->getTitle() }}</h2>
                        </div>

                        <div class="partnership-type flex">
                            <div class="info">
                                {!! $item->getContent() !!}
                                <a class="btn" target="_blank" href="{{ route('site.contact') }}#contact-form">@lang('main.apply')</a>
                            </div>

                            <div class="pricing-cards flex">
                                @if (filled($item = PagePlugin::getByIdentity(['identity' => 'system-integration-silver-partner'])))
                                    <div class="price-card silver">
                                        <h3 class="name">{{ $item->getTitle() }}</h3>
                                        <div class="fee masked">
                                            <span>{{ $item->getDescription() }}</span>
                                        </div>
                                        <p class="price">{!! strip_tags($item->getContent()) !!}</p>
                                    </div>
                                @endif

                               @if (filled($item = PagePlugin::getByIdentity(['identity' => 'system-integration-gold-partner'])))
                                <div class="price-card gold">
                                    <h3 class="name">{{ $item->getTitle() }}</h3>
                                    <div class="fee masked">
                                        <span>{{ $item->getDescription() }}</span>
                                    </div>
                                    <p class="price">{!! strip_tags($item->getContent()) !!}</p>
                                </div>
                                @endif

                               @if (filled($item = PagePlugin::getByIdentity(['identity' => 'system-integration-platinum-partner'])))
                                <div class="price-card platinum">
                                    <h3 class="name">{{ $item->getTitle() }}</h3>
                                    <div class="fee masked">
                                        <span>{{ $item->getDescription() }}</span>
                                    </div>
                                    <p class="price">{!! strip_tags($item->getContent()) !!}</p>
                                </div>
                                @endif
                            </div>
                        </div>

                        <!-- Partnership type-->
                    </div>
                </div>
            </div>

            <!-- Container-fluid-->
            @if (filled($item = PagePlugin::getByIdentity(['identity' => 'service-provider'])))
            <div class="container-fluid ptb-11" data-aos="fade-up" data-aos-duration="800">
                <div class="row">
                    <div class="col-xl-8 offset-xl-2">
                        <div class="section-header">
                            <h2 class="section-title">{{ $item->getTitle() }}</h2>
                        </div>

                        <div class="partnership-type flex">
                            <div class="info">
                                {!! $item->getContent() !!}
                                <a class="btn" target="_blank" href="{{ route('site.contact') }}#contact-form">@lang('main.apply')</a>
                            </div>

                            <div class="pricing-cards flex">
                                @if (filled($item = PagePlugin::getByIdentity(['identity' => 'service-provider-silver-partner'])))
                                    <div class="price-card silver">
                                        <h3 class="name">{{ $item->getTitle() }}</h3>
                                        <div class="fee masked">
                                            <span>{{ $item->getDescription() }}</span>
                                        </div>
                                        <p class="price">{!! strip_tags($item->getContent()) !!}</p>
                                    </div>
                                @endif

                                @if (filled($item = PagePlugin::getByIdentity(['identity' => 'service-provider-gold-partner'])))
                                <div class="price-card gold">
                                    <h3 class="name">{{ $item->getTitle() }}</h3>
                                    <div class="fee masked">
                                        <span>{{ $item->getDescription() }}</span>
                                    </div>
                                    <p class="price">{!! strip_tags($item->getContent()) !!}</p>
                                </div>
                                @endif

                                @if (filled($item = PagePlugin::getByIdentity(['identity' => 'service-provider-platinum-partner'])))
                                <div class="price-card platinum">
                                    <h3 class="name">{{ $item->getTitle() }}</h3>
                                    <div class="fee masked">
                                        <span>{{ $item->getDescription() }}</span>
                                    </div>
                                    <p class="price">{!! strip_tags($item->getContent()) !!}</p>
                                </div>
                                @endif
                            </div>
                        </div>
                        <!-- Partnership type-->
                    </div>
                </div>
            </div>
            @endif
            <!-- Container-fluid-->

            @if (filled($item = PagePlugin::getByIdentity(['identity' => 'partnership-type'])))
            <div class="container-fluid ptb-11" data-aos="fade-up" data-aos-duration="800">
                <div class="row">
                    <div class="col-xl-8 offset-xl-2">
                        <div class="section-header">
                            <h2 class="section-title">{{ $item->getTitle() }}</h2>
                        </div>

                        <div class="partnership-type flex">
                            <div class="info">
                                {!! $item->getContent() !!}
                                <a class="btn" target="_blank" href="{{ route('site.contact') }}#contact-form">@lang('main.apply')</a>
                            </div>

                            <div class="pricing-cards flex">
                                @if (filled($item = PagePlugin::getByIdentity(['identity' => 'partnership-type-silver-partner'])))
                                    <div class="price-card silver">
                                        <h3 class="name">{{ $item->getTitle() }}</h3>
                                        <div class="fee masked">
                                            <span>{{ $item->getDescription() }}</span>
                                        </div>
                                        <p class="price">{!! strip_tags($item->getContent()) !!}</p>
                                    </div>
                                @endif

                                @if (filled($item = PagePlugin::getByIdentity(['identity' => 'partnership-type-gold-partner'])))
                                <div class="price-card gold">
                                    <h3 class="name">{{ $item->getTitle() }}</h3>
                                    <div class="fee masked">
                                        <span>{{ $item->getDescription() }}</span>
                                    </div>
                                    <p class="price">{!! strip_tags($item->getContent()) !!}</p>
                                </div>
                               @endif

                                @if (filled($item = PagePlugin::getByIdentity(['identity' => 'partnership-type-platinum-partner'])))
                                <div class="price-card platinum">
                                    <h3 class="name">{{ $item->getTitle() }}</h3>
                                    <div class="fee masked">
                                        <span>{{ $item->getDescription() }}</span>
                                    </div>
                                    <p class="price">{!! strip_tags($item->getContent()) !!}</p>
                                </div>
                                @endif
                            </div>
                        </div>
                        <!-- Partnership type-->
                    </div>
                </div>
            </div>
            @endif
            <!-- Container-fluid-->
        </div>
        @endif
        <!-- Partnership types-->

       @widget('partners')

        @if (filled($whatYouGet = PagePlugin::getByIdentity(['identity' => 'partnership-what-you-get'])))
        <div class="what-you-get ptb-16">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-8 offset-xl-2">
                        <p class="text-center">{{ $whatYouGet->getDescription()  }}</p>
                        <div class="image masked">
                            <img src="{{ optional($whatYouGet->getFirstMedia('gallery'))->getUrl() }}" alt="Presentational image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <!-- What you get-->

       @include('site.partials.have-question')
    </section>
@endsection