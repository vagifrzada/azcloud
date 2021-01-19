@extends('layouts.site')

@section('content')
    <section class="page">
        <div class="container-fluid" data-aos="fade-in" data-aos-duration="800">
            <div class="row">
                <div class="col-xl-8 offset-xl-2">
                    <div class="page-header">
                        <h1 class="page-title">@lang('main.contact')</h1>
                    </div>

                    <div class="contact-details">
                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                <div class="contact-info">
                                    <a class="value" href="tel:{{ settings('city_phone_number') }}">{{ settings('city_phone_number') }}</a>
                                    <p class="label">@lang('main.city_phone_number')</p>
                                </div>
                                <div class="contact-info">
                                    <a class="value" href="mailto:{{ settings('email') }}">{{ settings('email') }}</a>
                                    <p class="label">@lang('main.email')</p>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-6">
                                <div class="contact-info">
                                    <a class="value" href="tel:{{ settings('mobile_phone_number') }}">{{ settings('mobile_phone_number') }}</a>
                                    <p class="label">@lang('main.phone_number')</p>
                                </div>
                                <div class="contact-info">
                                    <a class="value" href="mailto:{{ settings('support_email') }}">{{ settings('support_email') }}</a>
                                    <p class="label">@lang('main.support')</p>
                                </div>
                            </div>

                            <div class="col-md-3 offset-md-1">
                                <img src="{{ asset('assets/site/images/company-building.jpg') }}" alt="Company building">
                            </div>
                        </div>
                    </div>
                    <!-- Contact details-->
                </div>
            </div>
        </div>

        <div class="contact-map" data-aos="fade-in" data-aos-duration="800">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-8 offset-xl-2">
                        <div class="contact-info">
                            <p class="value">{{ settings('address') }}</p>
                            <p class="label">@lang('main.address')</p>
                        </div>
                    </div>
                </div>
            </div>

            <div id="map">
                <iframe src="{{ settings('google_map_url') }}" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
        <!-- Contact map-->

        <div class="follow-us ptb-11" data-aos="fade-in" data-aos-duration="800">
            <!-- Code required for "facebook pages" plugin-->
            <div id="fb-root"></div>
            <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&amp;version=v9.0&amp;appId=1057880097702757" nonce="kg8oD3Zm"></script>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-8 offset-xl-2">
                        <div class="row">
                            <div class="col-lg-4">
                                <h2 class="section-title">@lang('main.follow_us')</h2>
                            </div>
                            <!-- Col-->

                            <div class="col-lg-2 offset-lg-2 col-md-6">
                                <script src="https://platform.linkedin.com/in.js" type="text/javascript">
                                    lang: en_US
                                </script>
                                <script type="IN/FollowCompany" data-id="43333995" data-counter="bottom"></script>
                            </div>
                            <!-- Col-->

                            <div class="col-lg-4 col-md-6">
                                <div class="fb-page" data-href="{{ settings('facebook_page_url') }}" data-tabs="" data-width="500" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                                    <blockquote class="fb-xfbml-parse-ignore" cite="{{ settings('facebook_page_url') }}"><a href="{{ settings('facebook_page_url') }}">Azcloud</a></blockquote>
                                </div>
                            </div>
                            <!-- Col-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Follow us-->

        <div class="contact-form ptb-14" id="contact-form">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-8 offset-xl-2">
                        <div class="row">
                            <div class="col-xl-6 col-lg-7" data-aos="fade-right" data-aos-duration="800">
                                <h2 class="section-title">Bizə yazın</h2>

                                <form action="#" method="POST">
                                    <div class="form-group">
                                        <label for="fullname">Adınız və Soyadınız</label>
                                        <input class="form-control" type="text" id="fullname" placeholder="Adınız və Soyadınız" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone-number">Telefon</label>
                                        <input class="form-control" type="text" id="phone-number" placeholder="+994 50 550 50 50" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">E-poçt</label>
                                        <input class="form-control" type="email" id="email" placeholder="example@example.com" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="message">EMüraciətin mətni</label>
                                        <textarea class="form-control" rows="5" id="message" placeholder="Öz müraciətinizi bura daxil edin" required></textarea>
                                    </div>
                                    <button class="btn btn-primary">Göndər</button>
                                </form>
                                <!-- Form-->
                            </div>
                            <!-- Col-->

                            <div class="col-lg-5 hidden-991" data-aos="fade-left" data-aos-duration="800">
                                <img class="form-image" src="{{ asset('assets/site/images/contact-form-image.jpg') }}" alt="Form image">
                            </div>
                            <!-- Col-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact form-->

        <div class="subscribe-to-rss ptb-11">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-8 offset-xl-2">
                        <h3 class="section-title text-center">Subscribe to our newsletter</h3>

                        <form action="#" method="GET">
                            <div class="form-group">
                                <label>E-poçt</label>
                                <input class="form-control" type="text" placeholder="example@example.com" required>
                            </div>
                            <button class="btn btn-cyan with-icon" type="submit">
                                Subscribe<i class="icon-arrow-right"></i>
                            </button>
                        </form>
                        <!-- Form-->
                    </div>
                </div>
            </div>
        </div>
        <!-- Subscribe to RSS-->

        @include('site.partials.have-question')
    </section>
@endsection