<div class="side-menu flex">
    <div class="bg-video">
        <video class="lazy" autoplay muted loop playsinline>
            <source data-src="{{ asset('assets/site/videos/network.mp4') }}" type="video/mp4">
        </video>
    </div>

    <div class="side-menu-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 offset-xl-2">
                    <div class="row">
                        <div class="col-md-3">

                            <nav>
                                <ul class="menu-links">
                                    <li class="visible-1200">
                                        <a href="{{ settings('azcloud_console_url') }}">@lang('main.sign_in') / </a>
                                        <a href="{{ settings('azcloud_console_url') }}">@lang('main.sign_up')</a>
                                    </li>
                                    <li>
                                        <a class="menu-link" href="index.html">Əsas səhifə</a>
                                    </li>
                                    <li>
                                        <a class="menu-link" href="about.html">Haqqımızda</a>
                                    </li>
                                    <li>
                                        <a class="services-link" href="services.html">Xidmətlər</a>
                                    </li>
                                    <li>
                                        <a class="menu-link" href="blog.html">Bloq</a>
                                    </li>
                                    <li>
                                        <a class="menu-link" href="partnership.html">Əməkdaşlıq</a>
                                    </li>
                                    <li>
                                        <a class="menu-link" href="contact.html">Əlaqə</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <!-- Col-->

                        <div class="col-md-9">
                            <div class="menu-right-container default">
                                <div class="services-flips flex">

                                    <div class="service-flip">
                                        <div class="rotator">
                                            <div class="flip-front">
                                                <a class="flip-item" href="service-inner.html">
                                                    <span class="title">Bulud infrastrukturu</span>
                                                    <span class="subtitle">resurs elastikliyi</span>
                                                    <span class="price">199 AZN-dan<i class="icon-arrow-right"></i></span>
                                                </a>
                                            </div>
                                            <div class="flip-back">
                                                <div class="flip-bg cover-center" style="background-image: url(images/service-card-bg.jpg)"></div>
                                                <a class="flip-item" href="service-inner.html">
                                                    <span class="title">Bulud infrastrukturu</span>
                                                    <span class="subtitle">resurs elastikliyi</span>
                                                    <span class="price">199 AZN-dan<i class="icon-arrow-right"></i></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                @widget('ServicesWidget')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>