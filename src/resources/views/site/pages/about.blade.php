@extends('layouts.site')

@php use App\Plugins\Page\PagePlugin; @endphp

@section('content')
    <section class="page">
        @if (filled($aboutIntro = PagePlugin::getByIdentity(['identity' => 'about-intro'])))
            <div class="about-intro" data-aos="fade-in" data-aos-duration="800">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-8 offset-xl-2">
                            <div class="page-header text-center">
                                <h1 class="page-title">{{ $aboutIntro->getTitle() }}</h1>
                                <p class="subtitle">
                                    {!! $aboutIntro->getDescription() !!}
                                </p>
                            </div>
                            @if (filled($aboutIntroCover = $aboutIntro->getFirstMedia('gallery')))
                                <div class="cover">
                                    <img src="{{ $aboutIntroCover->getUrl()  }}" alt="{{ $aboutIntro->getTitle() }}">
                                </div>
                            @endif
                            <div class="text">
                                {!! $aboutIntro->getContent() !!}
                            </div>
                            <div class="scroll-down">
                                <i class="icon-arrow-down"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <!-- About intro-->

        <div class="our-values ptb-11" data-aos="fade-in" data-aos-duration="800">
            <div class="wave-texture bottom-right"></div>

            @if (filled($ourValues = PagePlugin::getByIdentity(['identity' => 'about-our-values'])))
            <div class="values-bg hidden-767">
                <img src="{{ asset('assets/site/images/values-bg.jpg') }}" alt="Azcloud values">
            </div>
            @endif

            <div class="container-fluid">
                <div class="row">
                    @if (filled($ourValues))
                        <div class="col-xl-8 offset-xl-2">
                        <div class="row">
                            <div class="col-md-6 offset-md-6">
                                <h2 class="section-title">{{ $ourValues->getTitle()  }}</h2>

                                <div class="values-list">

                                    @if (filled($item = PagePlugin::getByIdentity(['identity' => 'about-values-item-1'])))
                                    <div class="values-list-item">
                                        <div class="icon">
                                            <img src="{{ optional($item->getFirstMedia('gallery'))->getUrl() }}" alt="Icon users">
                                        </div>
                                        <div class="label">
                                            <span>{{ $item->getTitle() }}</span>
                                        </div>
                                    </div>
                                    @endif

                                    @if (filled($item = PagePlugin::getByIdentity(['identity' => 'about-values-item-2'])))
                                    <div class="values-list-item">
                                        <div class="icon">
                                            <img src="{{ optional($item->getFirstMedia('gallery'))->getUrl() }}" alt="Icon lamp">
                                        </div>
                                        <div class="label">
                                            <span>{{ $item->getTitle() }}</span>
                                        </div>
                                    </div>
                                    @endif

                                    @if (filled($item = PagePlugin::getByIdentity(['identity' => 'about-values-item-3'])))
                                    <div class="values-list-item">
                                        <div class="icon">
                                            <img src="{{ optional($item->getFirstMedia('gallery'))->getUrl() }}" alt="Icon cube">
                                        </div>
                                        <div class="label">
                                            <span>{{ $item->getTitle() }}</span>
                                        </div>
                                    </div>
                                    @endif

                                    @if (filled($item = PagePlugin::getByIdentity(['identity' => 'about-values-item-4'])))
                                    <div class="values-list-item">
                                        <div class="icon">
                                            <img src="{{ optional($item->getFirstMedia('gallery'))->getUrl() }}" alt="Icon shield">
                                        </div>
                                        <div class="label">
                                            <span>{{ $item->getTitle() }}</span>
                                        </div>
                                    </div>
                                   @endif

                                   @if (filled($item = PagePlugin::getByIdentity(['identity' => 'about-values-item-5'])))
                                    <div class="values-list-item">
                                        <div class="icon">
                                            <img src="{{ optional($item->getFirstMedia('gallery'))->getUrl() }}" alt="Icon flash">
                                        </div>
                                        <div class="label">
                                            <span>{{ $item->getTitle() }}</span>
                                        </div>
                                    </div>
                                    @endif

                                    @if (filled($item = PagePlugin::getByIdentity(['identity' => 'about-values-item-6'])))
                                    <div class="values-list-item">
                                        <div class="icon">
                                            <img src="{{ optional($item->getFirstMedia('gallery'))->getUrl() }}" alt="Icon lock">
                                        </div>
                                        <div class="label">
                                            <span>{{ $item->getTitle() }}</span>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <!-- Values list-->
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <!-- Our values-->

        @if (filled($aboutMission = PagePlugin::getByIdentity(['identity' => 'about-mission'])))
        <div class="our-mission ptb-11">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-8 offset-xl-2">
                        <div class="info-text">
                            {!! $aboutMission->getDescription() !!}
                        </div>
                        <div class="statistic-nums ptb-11">
                            <div class="row">
                                @if (filled($item = PagePlugin::getByIdentity(['identity' => 'about-mission-1'])))
                                <div class="col-lg-4 col-sm-6">
                                    <div class="statistic-num flex">
                                        <div class="image">
                                            <img src="{{ optional($item->getFirstMedia('gallery'))->getUrl() }}" alt="24/7 Support">
                                        </div>
                                        <div class="value flex">
                                            <div class="texture masked"></div>
                                            <div class="text-center">
                                               {!! $item->getContent() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <!-- Col-->
                                @if (filled($item = PagePlugin::getByIdentity(['identity' => 'about-mission-2'])))
                                <div class="col-lg-4 col-sm-6">
                                    <div class="statistic-num flex">
                                        <div class="image">
                                            <img src="{{ asset('assets/site/images/mission/image1.jpg')  }}" alt="Since 2016">
                                        </div>
                                        <div class="value flex">
                                            <div class="texture masked"></div>
                                            <div class="text-center">
                                                {!! $item->getContent() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <!-- Col-->
                                @if (filled($item = PagePlugin::getByIdentity(['identity' => 'about-mission-3'])))
                                <div class="col-lg-4 col-sm-6">
                                    <div class="statistic-num flex">
                                        <div class="image">
                                            <img src="{{ optional($item->getFirstMedia('gallery'))->getUrl() }}" alt="Reliability level">
                                        </div>
                                        <div class="value flex">
                                            <div class="texture masked"></div>
                                            <div class="text-center">
                                                {!! $item->getContent() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <!-- Col-->
                            </div>
                        </div>
                        <!-- Statistic numbers-->
                        <div class="info-text">
                            {!! $aboutMission->getContent() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <!-- Mission / vision-->

        @if (filled($block = PagePlugin::getByIdentity(['identity' => 'universal-block-1'])))
        <div class="universal-block flex" data-aos="fade-in" data-aos-duration="800">
            <div class="info flex">
                <div>
                    <h2 class="section-title">{{ $block->getTitle() }}</h2>
                    <div class="description">
                       {!! $block->getContent() !!}
                    </div>
                    <a class="btn with-icon" href="{{ $block->getDescription() }}" target="_blank">
                       @lang('main.see-more')<i class="icon-arrow-right"></i>
                    </a>
                </div>
            </div>
            <!-- Left-->

            @if (filled($gallery = $block->getGallery()))
            <div class="block-gallery">
                <div class="swiper-container">
                    <div class="swiper-wrapper">

                        @foreach($gallery as $image)
                        <div class="swiper-slide">
                            <img class="swiper-lazy" data-src="{{ $image->getUrl()  }}" alt="Slide image">
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
            @endif
            <!-- Right-->
        </div>
        @endif
        <!-- Universal block-->

        <div class="about-data-centers ptb-11" data-aos="fade-in" data-aos-duration="800">
            @if (filled($dataCenter = PagePlugin::getByIdentity(['identity' => 'data-centers'])))
                <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-8 offset-xl-2">
                        <div class="intro flex">
                            <h2 class="section-title">{{ $dataCenter->getTitle() }}</h2>
                            <div class="desc">
                                <p>{!! $dataCenter->getDescription() !!}</p>
                            </div>
                        </div>

                        @foreach($dataCenters as $dataCenter)
                            <div class="divider"></div>
                            <div class="data-center">
                                <div class="wave-texture top-right"></div>

                                <h3 class="name">{{ $dataCenter->title }}</h3>

                                @if(filled($gallery = $dataCenter->getGallery()))
                                    <div class="gallery flex">
                                        @foreach($gallery as $image)
                                            @if ($loop->index < 2)
                                                <div class="gallery-item">
                                                    <div class="image cover-center" style="background-image: url({{ $image->getUrl() }})"></div>
                                                </div>
                                            @endif
                                        @endforeach

                                        <div class="gallery-item">
                                            @foreach($gallery as $image)
                                                @if ($loop->index >= 2)
                                                    <div class="image cover-center" style="background-image: url({{ $image->getUrl() }})"></div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                                <div class="info">
                                    <h3 class="title">
                                        {{ $dataCenter->description }}
                                    </h3>
                                    <div class="desc">
                                        {!! $dataCenter->content !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
        </div>
        <!-- About data centers-->

        @widget('partners')

        <!-- Partners-->

        @if (filled($sertificates = PagePlugin::getByIdentity(['identity' => 'about-us-certificates'])))
        <div class="certificates ptb-14" data-aos="fade-in" data-aos-duration="800">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-8 offset-xl-2">
                        <div class="section-header">
                            <h2 class="section-title">{{ $sertificates->getTitle() }}</h2>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="certificate">
                                    <div class="image">
                                        <a href="#" target="_blank">
                                            <img src="{{ asset('assets/site/images/certificates/image0.jpg') }}" alt="Certificate">
                                        </a>
                                    </div>
                                    <div class="info">
                                        <h3 class="name">TIER III STANDARTI</h3>
                                        <div class="desc">
                                            <p>ABŞ-ın Uptime Institute-u tərəfindən işlənib-hazırlanmış Tier III kateqoriyasının əsas xüsusiyyətlərinə mühəndis altsistemlərinin paralel fəaliyyəti, ehtiyat soyutma sistemi, ehtiyat enerji təminatı sistemi, ehtiyat telekommunikasiya infrastrukturu daxildir.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Col-->
                </div>
            </div>
        </div>
        @endif
        <!-- Certificates-->

       @include('site.partials.have-question')
    </section>
    <!-- About page-->

@endsection