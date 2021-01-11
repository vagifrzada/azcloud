@extends('layouts.site')

@section('content')
    <section class="intro-slider">
        <div class="wave-texture bottom-right"></div>

        <div class="swiper-container" data-aos="fade-in" data-aos-duration="800">
            <div class="swiper-wrapper">
                <div class="swiper-slide no-swipe">
                    <div class="service-preview flex">
                        <div class="left">
                            <h1 class="title">Bulud infrastrukturu</h1>
                            <h2 class="subtitle">İnfrastrukturanuza uyğunlaşan və biznes artımı idarə eyməyə imkan verən elsatikliyi</h2>
                            <div class="actions">
                                <a class="btn btn-primary" href="#">Əldə et</a>
                                <a class="btn btn-outline" href="#">Qiymətlər</a>
                            </div>
                        </div>
                        <div class="right">
                            <img src="{{ asset('assets/site/images/intro-slider/image0.png') }}" alt="Service image">
                        </div>
                    </div>
                </div>
                <!-- Swiper slide-->

                <div class="swiper-slide no-swipe">
                    <div class="service-preview flex">
                        <div class="left">
                            <h1 class="title">Lorem, ipsum dolor.</h1>
                            <h2 class="subtitle">İnfrastrukturanuza uyğunlaşan və biznes artımı idarə eyməyə imkan verən elsatikliyi</h2>
                            <div class="actions">
                                <a class="btn btn-primary" href="#">Əldə et</a>
                                <a class="btn btn-outline" href="#">Qiymətlər</a>
                            </div>
                        </div>
                        <div class="right">
                            <img src="{{ asset('assets/site/images/intro-slider/image0.png') }}" alt="Service image">
                        </div>
                    </div>
                </div>
                <!-- Swiper slide-->

                <div class="swiper-slide no-swipe">
                    <div class="service-preview flex">
                        <div class="left">
                            <h1 class="title">Bulud infrastrukturu</h1>
                            <h2 class="subtitle">İnfrastrukturanuza uyğunlaşan və biznes artımı idarə eyməyə imkan verən elsatikliyi</h2>
                            <div class="actions">
                                <a class="btn btn-primary" href="#">Əldə et</a>
                                <a class="btn btn-outline" href="#">Qiymətlər</a>
                            </div>
                        </div>
                        <div class="right">
                            <img src="{{ asset('assets/site/images/intro-slider/image0.png')  }}" alt="Service image">
                        </div>
                    </div>
                </div>
                <!-- Swiper slide-->

                <div class="swiper-slide no-swipe">
                    <div class="service-preview flex">
                        <div class="left">
                            <h1 class="title">Bulud infrastrukturu</h1>
                            <h2 class="subtitle">İnfrastrukturanuza uyğunlaşan və biznes artımı idarə eyməyə imkan verən elsatikliyi</h2>
                            <div class="actions">
                                <a class="btn btn-primary" href="#">Əldə et</a>
                                <a class="btn btn-outline" href="#">Qiymətlər</a>
                            </div>
                        </div>
                        <div class="right">
                            <img src="{{ asset('assets/site/images/intro-slider/image0.png')  }}" alt="Service image">
                        </div>
                    </div>
                </div>
                <!-- Swiper slide-->
            </div>
            <!-- Swiper wrapper-->

            <div class="pagination-wrapper flex">
                <div class="fraction">
                    <span class="current">1</span>
                    <span class="divider">/</span>
                    <span class="total">4</span>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
        <!-- Swiper container-->

        <button class="to-services hidden-1200">
            <img src="{{ asset('assets/site/images/icons/icon-angle-down.svg') }}" alt="Icon arrow down">Xidmətlərimiz
        </button>
    </section>
    <!-- Intro slider-->

    <section class="services-section">
        <div class="services-heading">
            <div class="bg-video">
                <video class="lazy" autoplay muted loop playsinline>
                    <source data-src="{{ asset('assets/site/videos/network.mp4') }}" type="video/mp4">
                </video>
            </div>

            <div class="scrollable-x">
                <div class="left">
                    <img src="{{ asset('assets/site/images/standarts/icon0.svg') }}" alt="ISO standart">
                    <img src="{{ asset('assets/site/images/standarts/icon1.svg') }}" alt="ISO standart">
                    <img src="{{ asset('assets/site/images/standarts/icon2.svg') }}" alt="ISO standart">
                    <img src="{{ asset('assets/site/images/standarts/icon0.svg') }}" alt="ISO standart">
                    <img src="{{ asset('assets/site/images/standarts/icon1.svg') }}" alt="ISO standart">
                    <img src="{{ asset('assets/site/images/standarts/icon2.svg') }}" alt="ISO standart">
                    <img src="{{ asset('assets/site/images/standarts/icon0.svg') }}" alt="ISO standart">
                    <img src="{{ asset('assets/site/images/standarts/icon1.svg') }}" alt="ISO standart">
                    <img src="{{ asset('assets/site/images/standarts/icon2.svg') }}" alt="ISO standart">
                </div>
                <div class="right">
                    <img src="{{ asset('assets/site/images/azintelecom.svg') }}" alt="Azintelecom logo">
                </div>
            </div>
        </div>
        <!-- Services heading-->

        <div class="services-body ptb-14">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-8 offset-xl-2">
                        <div class="section-header">
                            <h2 class="section-title">Xİdmətlərimiz</h2>
                        </div>

                        <div class="services-grid flex" data-aos="fade-in" data-aos-duration="800">
                            <div class="service-card wider">
                                <div class="rotator">
                                    <div class="card-front">
                                        <a class="service-item" href="service-inner.html">
                                            <span class="title">Bulud infrastrukturu</span>
                                            <span class="subtitle">resurs elastikliyi</span>
                                            <span class="price">199 AZN-dan<i class="icon-arrow-right"></i></span>
                                        </a>
                                    </div>
                                    <div class="card-back">
                                        <div class="card-bg cover-center" style="background-image: url({{ asset('assets/site/images/service-card-bg.jpg') }})"></div>
                                        <a class="service-item" href="service-inner.html">
                                            <span class="title">Bulud infrastrukturu</span>
                                            <span class="subtitle">resurs elastikliyi</span>
                                            <span class="price">199 AZN-dan<i class="icon-arrow-right"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- Service card-->

                            <div class="service-card">
                                <div class="rotator">
                                    <div class="card-front">
                                        <a class="service-item" href="service-inner.html">
                                            <span class="title">Virtual İP telefoniya</span>
                                            <span class="subtitle">resurs elastikliyi</span>
                                            <span class="price">20 AZN-dan<i class="icon-arrow-right"></i></span>
                                        </a>
                                    </div>
                                    <div class="card-back">
                                        <div class="card-bg cover-center" style="background-image: url({{ asset('assets/site/images/service-card-bg.jpg') }})"></div>
                                        <a class="service-item" href="service-inner.html">
                                            <span class="title">Virtual İP telefoniya</span>
                                            <span class="subtitle">resurs elastikliyi</span>
                                            <span class="price">20 AZN-dan<i class="icon-arrow-right"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- Service card-->

                            <div class="service-card">
                                <div class="rotator">
                                    <div class="card-front">
                                        <a class="service-item" href="service-inner.html">
                                            <span class="title">Təhlükəsizlik həlləri</span>
                                            <span class="subtitle">resurs elastikliyi</span>
                                            <span class="price">980 AZN-dan<i class="icon-arrow-right"></i></span>
                                        </a>
                                    </div>
                                    <div class="card-back">
                                        <div class="card-bg cover-center" style="background-image: url({{ asset('assets/site/images/service-card-bg.jpg')  }})"></div>
                                        <a class="service-item" href="service-inner.html">
                                            <span class="title">Təhlükəsizlik həlləri</span>
                                            <span class="subtitle">resurs elastikliyi</span>
                                            <span class="price">980 AZN-dan<i class="icon-arrow-right"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- Service card-->

                            <div class="service-card">
                                <div class="rotator">
                                    <div class="card-front">
                                        <a class="service-item" href="service-inner.html">
                                            <span class="title">Rezervlənmə xidməti</span>
                                            <span class="subtitle">resurs elastikliyi</span>
                                            <span class="price">Ətraflı bax<i class="icon-arrow-right"></i></span>
                                        </a>
                                    </div>
                                    <div class="card-back">
                                        <div class="card-bg cover-center" style="background-image: url({{ asset('assets/site/images/service-card-bg.jpg') }})"></div>
                                        <a class="service-item" href="service-inner.html">
                                            <span class="title">Rezervlənmə xidməti</span>
                                            <span class="subtitle">resurs elastikliyi</span>
                                            <span class="price">Ətraflı bax<i class="icon-arrow-right"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- Service card-->

                            <div class="service-card">
                                <div class="rotator">
                                    <div class="card-front">
                                        <a class="service-item" href="service-inner.html">
                                            <span class="title">Microsoft məhsulları</span>
                                            <span class="subtitle">resurs elastikliyi</span>
                                            <span class="price">Ətraflı bax<i class="icon-arrow-right"></i></span>
                                        </a>
                                    </div>
                                    <div class="card-back">
                                        <div class="card-bg cover-center" style="background-image: url({{ asset('assets/site/images/service-card-bg.jpg') }})"></div>
                                        <a class="service-item" href="service-inner.html">
                                            <span class="title">Microsoft məhsulları</span>
                                            <span class="subtitle">resurs elastikliyi</span>
                                            <span class="price">Ətraflı bax<i class="icon-arrow-right"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- Service card-->

                            <div class="service-card wider">
                                <div class="rotator">
                                    <div class="card-front">
                                        <a class="service-item" href="service-inner.html">
                                            <span class="title">Yerləşdirmə</span>
                                            <span class="subtitle">resurs elastikliyi</span>
                                            <span class="price">249 AZN-dan<i class="icon-arrow-right"></i></span>
                                        </a>
                                    </div>
                                    <div class="card-back">
                                        <div class="card-bg cover-center" style="background-image: url({{ asset('assets/site/images/service-card-bg.jpg') }})"></div>
                                        <a class="service-item" href="service-inner.html">
                                            <span class="title">Yerləşdirmə</span>
                                            <span class="subtitle">resurs elastikliyi</span>
                                            <span class="price">249 AZN-dan<i class="icon-arrow-right"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- Service card-->
                        </div>
                        <!-- Services grid-->
                    </div>
                </div>
            </div>
        </div>
        <!-- Services body-->
    </section>
    <!-- Services-->

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
                        <h2 class="section-title">Müştərilər</h2>
                        <p class="subtitle">We're partners with countless major organisations around the globe</p>
                    </div>

                    <div class="clients-slider">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <a class="company-thumb" href="#" target="_blank">
                                        <img src="{{ asset('assets/site/images/partners/image0.png') }}" alt="Client logo">
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a class="company-thumb" href="#" target="_blank">
                                        <img src="{{ asset('assets/site/images/partners/image0.png') }}" alt="Client logo">
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a class="company-thumb" href="#" target="_blank">
                                        <img src="{{ asset('assets/site/images/partners/image0.png') }}" alt="Client logo">
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a class="company-thumb" href="#" target="_blank">
                                        <img src="{{ asset('assets/site/images/partners/image0.png') }}" alt="Client logo">
                                    </a>
                                </div>
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
    <!-- Clients-->

    <section class="advantages ptb-14" data-aos="fade-in" data-aos-duration="800">
        <div class="wave-texture top-right"></div>
        <div class="wave-texture bottom-left"></div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 offset-xl-2">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="info">
                                <h2 class="section-title">Üstünlüklərimiz</h2>
                                <div class="desc">
                                    <p>Bizim fərqləndirici cəhətimiz bazar tendensiyaları və ən müasir texnologiyalara uyğunluğumuzdur. Data mərkəzimizin əsas üstünlükləri arasında informasiya təhlükəsizliyinin təmin edilməsi, kibertəhdidlərin qarşısının alınması və data itkisi ilə bağlı risklərin minimuma endirilməsini qeyd etməliyik. Bundan başqa, təklif etdiyimiz xidmətlərə 24/7 rejimində texniki dəstək təmin edirik.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Col-->

                        <div class="col-md-6">
                            <div class="image">
                                <img src="{{ asset('assets/site/images/advantages.jpg') }}" alt="Presentational image">
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

                <div class="swiper-slide">
                    <div class="advantage-block">
                        <div class="icon">
                            <img src="{{ asset('assets/site/images/icons/icon-shield.svg') }}" alt="Icon shield">
                        </div>
                        <h3 class="title text-uppercase">TƏHLÜKƏSİZ</h3>
                        <p class="subtitle">Fiziki və virtual müdafiə Yanğına qarşı mühafizə sistemi</p>
                        <a class="read-more" href="about.html">Daha ətraflı</a>
                    </div>
                </div>
                <!-- Slide-->

            </div>
        </div>
        <!-- Advantages slider-->
    </section>
    <!-- Advantages-->

    <div class="full-width-section ptb-16" data-aos="fade-in" data-aos-duration="800">
        <div class="bg-video">
            <video class="lazy" autoplay muted loop playsinline>
                <source src="{{ asset('assets/site/videos/switch.mp4') }}" type="video/mp4">
            </video>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 offset-xl-2">
                    <h3 class="section-title">Exposure Server</h3>
                    <p class="subtitle">Cloud Core Exposure Server…</p>
                    <a class="btn btn-white" href="contact.html#contact-form">Contact us</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Full width bg-->

    <section class="feedback-section pt-14">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 offset-xl-2">
                    <div class="section-header">
                        <h2 class="section-title">Bizim haqqımızda nə fikirləşirlər</h2>
                    </div>

                    <div class="feedback-top">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">

                                <div class="swiper-slide">
                                    <div class="feedback">
                                        <div class="quote">
                                            <p>«İdarə edilən xidmət provayderi (MSP) bizim xidmətlərimizdən istifadə edərək son istifadəçi üçün şəbəkə və ya İT infrastrukturu yaratmaqda kömək etməklə yanaşı onların idarə edilməsini təmin edir»</p>
                                        </div>
                                        <div class="quote-author flex">
                                            <div class="thumb">
                                                <img src="{{ asset('assets/site/images/users/image0.jpg') }}" alt="Quote author">
                                            </div>
                                            <div class="info">
                                                <p class="name">Əhməd Rəcəbli</p>
                                                <p class="he-is">Piere Cardin company, CEO</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

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

                                <div class="swiper-slide">
                                    <div class="thumb">
                                        <img src="{{ asset('assets/site/images/users/image0.jpg') }}" alt="Quote author">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Feedback thumbs-->
    </section>
    <!-- Feedback-->

    <section class="data-centers ptb-14" data-aos="fade-in" data-aos-duration="800">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 offset-xl-2">
                    <div class="section-header">
                        <h2 class="section-title">Data Mərkəzlər</h2>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="data-center-item">
                                <div class="image">
                                    <a href="about.html">
                                        <img src="{{ asset('assets/site/images/data-centers/image0.jpg') }}" alt="Data center">
                                    </a>
                                </div>
                                <div class="info">
                                    <a class="name" href="about.html">Baki Data Merkezi haqqında məlumat</a>
                                    <p class="desc">İnfrastrukturunuza uyğunlaşan və biznes artımını idarə etməyə imkan verən resurs elastikliyi</p>
                                </div>
                            </div>
                        </div>
                        <!-- Col-->

                        <div class="col-md-6">
                            <div class="data-center-item">
                                <div class="image">
                                    <a href="about.html">
                                        <img src="{{ asset('assets/site/images/data-centers/image1.jpg') }}" alt="Data center">
                                    </a>
                                </div>
                                <div class="info">
                                    <a class="name" href="about.html">Yevlax Data Mərkəzi haqqında məlumat</a>
                                    <p class="desc">İnfrastrukturunuza uyğunlaşan və biznes artımını idarə etməyə imkan verən resurs elastikliyi</p>
                                </div>
                            </div>
                        </div>
                        <!-- Col-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Data centres-->

    <section class="clients ptb-14" data-aos="fade-in" data-aos-duration="800">
        <div class="bg-video">
            <video class="lazy" autoplay muted loop playsinline>
                <source data-src="{{ asset('assets/site/videos/network.mp4') }}" type="video/mp4">
            </video>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 offset-xl-2">
                    <div class="section-header text-center">
                        <h2 class="section-title">Parnertlar</h2>
                    </div>

                    <div class="partners-slider">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">

                                <div class="swiper-slide">
                                    <a class="company-thumb" href="#" target="_blank">
                                        <img src="{{ asset('assets/site/images/partners/image0.png') }}" alt="Client logo">
                                    </a>
                                </div>

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
    </section>
    <!-- Partners-->

    <section class="latest-blog ptb-14">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 offset-xl-2">
                    <div class="section-header text-center">
                        <h2 class="section-title">Axırıncı bloq yazısı</h2>
                    </div>

                    <div class="blog-article flex">
                        <div class="image masked">
                            <a href="blog-inner.html">
                                <img src="{{ asset('assets/site/images/blog/image0.jpg') }}" alt="Blog title">
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

                    <a class="btn btn-block" href="blog.html">Bütün yazılar</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest blog-->

    <div class="have-question ptb-11">
        <div class="bg-video">
            <video class="lazy" autoplay muted loop playsinline>
                <source data-src="{{ asset('assets/site/videos/network.mp4') }}" type="video/mp4">
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
                                <img src="{{ asset('assets/site/images/azcloud-logo.svg') }}" alt="Logo azcloud">
                                <a href="#" target="_blank">
                                    <img src="{{ asset('assets/site/images/azintelecom-logo.svg') }}" alt="Logo azintelecom">
                                </a>
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
@endsection