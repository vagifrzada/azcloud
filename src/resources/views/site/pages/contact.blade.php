@extends('layouts.site')

@php use App\Plugins\Page\PagePlugin; @endphp

@section('meta_title', $meta['title'])
@section('meta_keywords', $meta['keywords'])
@section('meta_description', $meta['description'])

@push('styles')
    <style>
        .info-message {display:none; padding-bottom: 7px;}
        .info-message .success {color: green} .info-message .error {color: red}
    </style>
@endpush

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
                                @if (filled($contact = PagePlugin::getByIdentity(['identity' => 'contact'])))
                                    <img src="{{ optional($contact->getCover())->getUrl() }}" alt="Company building">
                                @endif
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
                            <p class="value">@lang('contact.address')</p>
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
                            <div class="col-lg-3">
                                <h2 class="section-title">@lang('main.follow_us')</h2>
                            </div>
                            <!-- Col-->
                            <div class="col-lg-4 offset-lg-1 col-md-6">
                                <ul class="follow-list">
                                    <li class="follow-list__item follow-list__item_linkedin">
                                        <a href="https://www.linkedin.com/company/azcloudaz" class="follow-link follow-link_linkedin" target="_blank"><i class="icon-linkedin" style="display: block; margin-right: 16px;"></i><span style="display: block;">@lang('contact.followLinkedin')</span></a>
                                        <script type="IN/FollowCompany" data-id="43333995" data-counter="bottom"></script>
                                    </li>
                                    <li class="follow-list__item follow-list__item_twitter">
                                        <a href="https://twitter.com/azcloud_az" class="follow-link follow-link_twitter" target="_blank"><i class="icon-twitter" style="display: block; margin-right: 16px;"></i><span style="display: block;">@lang('contact.followTwitter')</span></a>
                                        <a href="https://twitter.com/azcloud_az?ref_src=twsrc%5Etfw" class="twitter-follow-button" style="display: none;" data-show-count="false">@lang('contact.followTwitter')</a>
                                    </li>
                                    <li class="follow-list__item follow-list__item_youtube">
                                        <a href="https://www.youtube.com/channel/UCMaG50HL6TFn9Isje18Wzzw" class="follow-link follow-link_youtube" target="_blank"><i class="icon-youtube-play" style="display: block; margin-right: 16px;"></i><span style="display: block;">@lang('contact.followYoutube')</span></a>
                                        <div class="g-ytsubscribe" data-channelid="UCMaG50HL6TFn9Isje18Wzzw" data-layout="default" data-count="default"></div>
                                    </li>
                                </ul>
                            </div>
                            <!-- Col-->

                            <style>
                                .follow-list{
                                    flex-direction: column;
                                }
                                .follow-list .follow-list__item{
                                    margin-bottom: 16px;
                                }
                                .follow-list .follow-list__item:last-child{
                                    margin-bottom: 0;
                                }

                                .follow-link{
                                    display: flex;
                                    text-decoration: none;
                                    padding: 8px 16px;
                                    font-family: 'Montserrat SemiBold';
                                    font-weight: 600;
                                    font-size: 14px;
                                    line-height: 40px;
                                }

                                .follow-link.follow-link_linkedin{
                                    background-color: #265F93;
                                    color: #fff;
                                }

                                .follow-link.follow-link_twitter{
                                    background-color: #4595DA;
                                    color: #fff;
                                }

                                .follow-link.follow-link_youtube{
                                    background-color: #D43929;
                                    color: #fff;
                                }
                            </style>

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
                                <h2 class="section-title">@lang('main.write_us')</h2>

                                <form name="contactForm" id="contactForm" action="{{ route('site.contact.send') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="fullname">@lang('main.fullname')</label>
                                        <input class="form-control" type="text" name="fullname" id="fullname" placeholder="@lang('main.fullname')" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone-number">@lang('main.phone')</label>
                                        <input class="form-control" type="text" name="phone" id="phone-number" placeholder="+994 50 550 50 50" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">@lang('main.email')</label>
                                        <input class="form-control" type="email" id="email" name="email" placeholder="example@example.com" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="message">@lang('main.message')</label>
                                        <textarea class="form-control" rows="5" id="message" name="message" placeholder="@lang('main.your_message')" required></textarea>
                                    </div>

                                    <div class="info-message"></div>
                                    <button type="submit" class="btn btn-primary">@lang('main.send')</button>
                                </form>
                                <!-- Form-->
                            </div>
                            <!-- Col-->

                            <script src="https://www.google.com/recaptcha/api.js?render=6Les8k0bAAAAADHEswRUgh6oekBPibg6Tt95A4lc"></script>
                            <script>
                                function onSubmit(token) {
                                    onContactFormSubmit()
                                    $("#contact-form form").trigget("submit");
                                }
                                // function onClick(e) {
                                //     console.log(e)
                                //     e.preventDefault();
                                //     grecaptcha.ready(function() {
                                //         grecaptcha.execute('6Les8k0bAAAAADHEswRUgh6oekBPibg6Tt95A4lc', {action: 'submit'}).then(function(token) {
                                //             // Add your logic to submit to your backend server here.
                                //         });
                                //     });
                                // }
                            </script>

                            <div class="col-lg-5 hidden-991" data-aos="fade-left" data-aos-duration="800">
                                @if (filled($formImage = PagePlugin::getByIdentity(['identity' => 'contact-form-image'])))
                                    <img class="form-image" src="{{ optional($formImage->getCover())->getUrl() }}" alt="Form image">
                                @endif
                            </div>
                            <!-- Col-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact form-->

        @include('site.partials.newsletter')
        @include('site.partials.have-question')
    </section>
@endsection