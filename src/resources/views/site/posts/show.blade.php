@extends('layouts.site')

@php /** @var \App\Entities\Post\Post $post */ @endphp

@section('content')
    <section class="page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 offset-xl-2">
                    <div class="blog-content">

                        <nav class="hidden-991">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('site.home') }}">@lang('main.home')</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('site.blog') }}">@lang('posts.blog')</a></li>
                                <li class="breadcrumb-item">{{ $post->getTitle()  }}</li>
                            </ol>
                        </nav>
                        <!-- Breadcrumb-->

                        <div class="blog-intro">
                            <h1 class="blog-title">{{ $post->getTitle() }}</h1>
                            <span class="blog-date">{{ $post->getCreatedAt()->format('d.m.Y') }}</span>
                            <div class="blog-cover-image">
                                <img src="{{ $post->getCover()->getUrl() }}" alt="{{ $post->getTitle() }}">
                                <!-- <span class="source">Image Credits: Brian Heater</span> -->
                            </div>
                        </div>
                        <!-- Blog intro-->

                        <div class="editor-body">
                            {!! $post->getContent() !!}
                        </div>
                        <!-- Editor body-->

                        <a class="service-item" href="service-inner.html">
                            <span class="title">Bulud infrastrukturu</span>
                            <span class="subtitle">resurs elastikliyi</span>
                            <span class="price">199 AZN-dan<i class="icon-arrow-right"></i></span>
                        </a>
                        <!-- Service item-->

                        <div class="blog-article flex">
                            <div class="image masked">
                                <a href="blog-inner.html">
                                    <img src="images/blog/image0.jpg" alt="Blog title">
                                </a>
                            </div>
                            <div class="info">
                                <span class="date">01.05.2020</span>
                                <a class="title" href="blog-inner.html">İT infrastrukturu yaratmaqda kömək etməklə yanaşı onların idarə edilməsini təmin edir</a>

                                <div class="read-more">
                                    <a href="blog-inner.html">Ətraflı oxu<i class="icon-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- Blog article-->

                        @if (filled($gallery = $post->getGallery()))
                        <div class="blog-gallery">
                            <div class="gallery-top">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                        @foreach($gallery as $item)
                                            <div class="swiper-slide">
                                                <div class="swiper-lazy" data-background="{{ $item->getUrl() }}"></div>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="swiper-button-prev masked hidden-991">
                                        <i class="icon-arrow-left"></i>
                                    </div>
                                    <div class="swiper-button-next masked hidden-991">
                                        <i class="icon-arrow-right"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- Gallery top-->

                            <div class="gallery-thumbs">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                        @foreach($gallery as $item)
                                            <div class="swiper-slide">
                                                <div class="swiper-lazy" data-background="{{ $item->getUrl('gallery-thumb') }}"></div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!-- Gallery thumbs-->
                        </div>
                        @endif
                        <!-- Blog gallery-->

                        @if(filled($tags = $post->getTags()))
                            <div class="tags">
                                <ul>
                                    <li>@lang('posts.tags')</li>
                                    @foreach($tags as $tag)
                                        <li><a href="{{ route('site.blog.tags.show', ['tag' => $tag]) }}">{{ $tag }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <!-- Tags-->

                        <div class="blog-actions">
                            <ul class="sticky">
                                <li>
                                    <a href="#" target="_blank">
                                        <i class="icon-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank">
                                        <i class="icon-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank">
                                        <i class="icon-linkedin"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="action-copy" href="#" data-copied="link copied">copy link</a>
                                    <input type="text" value="link to copy" readonly>
                                </li>
                            </ul>
                        </div>

                        <div class="scroll-down">
                            <i class="icon-arrow-down"></i>
                        </div>
                    </div>
                    <!-- Blog content-->
                </div>
            </div>
        </div>
        <!-- Container fluid-->

        <div class="related-blog-posts">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-8 offset-xl-2">
                        <div class="section-header text-center">
                            <h2 class="section-title">Maraqlı ola bilər</h2>
                        </div>

                        <div class="load-container">
                            <div class="row">
                                <div class="col-lg-4 col-sm-6">
                                    <div class="blog-post">
                                        <div class="image">
                                            <a href="blog-inner.html">
                                                <img src="images/blog/image1.jpg" alt="Blog title">
                                            </a>
                                        </div>
                                        <div class="info">
                                            <span class="date">01.05.2020</span>
                                            <a class="title" href="blog-inner.html">Satış dilerlərimizə ictimai, özəl və dövlət sektoru</a>

                                            <div class="read-more">
                                                <a href="blog-inner.html">Ətraflı oxu</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Col-->

                                <div class="col-lg-4 col-sm-6">
                                    <div class="blog-post">
                                        <div class="image">
                                            <a href="blog-inner.html">
                                                <img src="images/blog/image2.jpg" alt="Blog title">
                                            </a>
                                        </div>
                                        <div class="info">
                                            <span class="date">01.05.2020</span>
                                            <a class="title" href="blog-inner.html">Satış dilerlərimizə ictimai, özəl və dövlət sektorundan olan müştərilərə etibarlı</a>

                                            <div class="read-more">
                                                <a href="blog-inner.html">Ətraflı oxu</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Col-->

                                <div class="col-lg-4 col-sm-6">
                                    <div class="blog-post">
                                        <div class="image">
                                            <a href="blog-inner.html">
                                                <img src="images/blog/image3.jpg" alt="Blog title">
                                            </a>
                                        </div>
                                        <div class="info">
                                            <span class="date">01.05.2020</span>
                                            <a class="title" href="blog-inner.html">SQL Server və poçtun idarə edilməsi üçün Exchange Server proqram</a>

                                            <div class="read-more">
                                                <a href="blog-inner.html">Ətraflı oxu</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Col-->
                            </div>
                        </div>
                        <!-- Load container-->


                        <div class="load-more">
                            <a class="btn btn-block" href="#">Daha çox yüklə</a>
                        </div>
                    </div>
                    <!-- Col-->
                </div>
            </div>
        </div>
        <!-- Related blog posts-->

        <div class="have-question ptb-11">
            <div class="bg-video">
                <video class="lazy" autoplay muted loop playsinline>
                    <source data-src="videos/network.mp4" type="video/mp4">
                </video>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-8 offset-xl-2">
                        <div class="inner flex">
                            <p>Остались какие-либо вопросы? Мы рады помочь ответить на них!</p>
                            <a class="btn btn-white" href="contact.html">Müraciət et</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="azcloud-azintelecom">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-8 offset-xl-2">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="logos">
                                    <img src="images/azcloud-logo.svg" alt="Logo azcloud">
                                    <a href="#" target="_blank">
                                        <img src="images/azintelecom-logo.svg" alt="Logo azintelecom"></a>
                                </div>
                            </div>
                            <!-- Col-->

                            <div class="col-lg-6">
                                <div class="text">
                                    <p>SEO text. İnfrastrukturunuza uyğunlaşan və biznes artımını idarə etməyə imkan verən resurs elastikliyi. İnfrastrukturunuza uyğunlaşan və biznes artımını idarə etməyə imkan verən resurs elastikliyi</p>
                                </div>
                            </div>
                            <!-- Col-->
                        </div>
                    </div>
                    <!-- Col-->
                </div>
            </div>
        </div>
        <!-- Azcloud / aztelecom (seo)-->
    </section>
    <!-- Blog inner page-->
@endsection