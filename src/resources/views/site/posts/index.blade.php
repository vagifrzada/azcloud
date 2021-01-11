@extends('layouts.site')

@section('content')
    <section class="page blog-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 offset-xl-2">
                    <div class="page-header text-center">
                        <h1 class="page-title">@lang('posts.blog')</h1>
                    </div>

                    <div class="load-container">

                        <div class="posts-chunk">
                            <div class="row">
                                <div class="col-12" data-aos="fade-up" data-aos-duration="800">
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
                                </div>
                                <!-- Col-->

                                <div class="col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="800">
                                    <div class="blog-post">
                                        <div class="image">
                                            <a href="blog-inner.html">
                                                <img src="{{ asset('assets/site/images/blog/image1.jpg') }}" alt="Blog title">
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
                                <div class="col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="800">
                                    <div class="blog-post">
                                        <div class="image">
                                            <a href="blog-inner.html">
                                                <img src="{{ asset('assets/site/images/blog/image1.jpg') }}" alt="Blog title">
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
                                <div class="col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="800">
                                    <div class="blog-post">
                                        <div class="image">
                                            <a href="blog-inner.html">
                                                <img src="{{ asset('assets/site/images/blog/image1.jpg') }}" alt="Blog title">
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
                            </div>
                        </div>
                        <!-- Posts chunk-->

                    </div>
                    <!-- Load container-->

                    <div class="load-more">
                        <a class="btn btn-block" href="#">Daha çox yüklə</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container fluid-->

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
    <!-- Blog page-->
@endsection