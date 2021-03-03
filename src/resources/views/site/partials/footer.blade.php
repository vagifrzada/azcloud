<button class="to-top hidden-991" aria-label="Scroll top">
    <i class="icon-arrow-up"></i>
</button>

<footer>
    <div class="footer-top">
        <div class="wave-texture bottom-right"></div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 offset-xl-2">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="footer-contacts">
                                <p class="label">@lang('main.contact')</p>
                                <table>
                                    <tr>
                                        <td><strong>@lang('main.address_singular'):</strong></td>
                                        <td>
                                            <p>{{ settings('address') }}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>@lang('main.phone'): </strong></td>
                                        <td>
                                            <p>{{ settings('mobile_phone_number') }}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>@lang('main.email'):</strong></td>
                                        <td>
                                            <p>{{ settings('email') }}</p>
                                        </td>
                                    </tr>
                                </table>
                                <ul class="socials">
                                    <li>
                                        <a href="{{ settings('linkedin_url') }}" rel="noreferrer" target="_blank">
                                            <i class="icon-linkedin"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ settings('youtube_url') }}" rel="noreferrer" target="_blank">
                                            <i class="icon-youtube-play"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ settings('facebook_page_url') }}" rel="noreferrer" target="_blank">
                                            <i class="icon-facebook"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Col-->

                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="footer-links">
                                        <p class="label">Sitemap</p>
                                        <ul>
                                            <li><a href="index.html">Əsas səhifə</a></li>
                                            <li>
                                                <a href="about.html">Haqqımızda</a>
                                            </li>
                                            <li>
                                                <a href="services.html">Xidmətlər</a>
                                            </li>
                                            <li>
                                                <a href="blog.html">Blog</a>
                                            </li>
                                            <li>
                                                <a href="partnership.html">Əməkdaşlıq</a>
                                            </li>
                                            <li>
                                                <a href="contact.html">Əlaqə</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Col-->

                                <div class="col-sm-6">
                                    <div class="footer-links">
                                        <p class="label">Xidmətlər</p>
                                        <ul>
                                            <li>
                                                <a href="service.html">Bulud infrastrukturu</a>
                                            </li>
                                            <li>
                                                <a href="service.html">Virtual İP telefoniya</a>
                                            </li>
                                            <li>
                                                <a href="service.html">Təhlükəsizlik həlləri</a>
                                            </li>
                                            <li>
                                                <a href="service.html">Rezervlənmə xidməti</a>
                                            </li>
                                            <li>
                                                <a href="service.html">Microsoft məhsulları</a>
                                            </li>
                                            <li>
                                                <a href="service.html">Yerləşdirmə</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Col-->
                            </div>
                            <!-- Row-->
                        </div>
                        <!-- Col-->
                    </div>
                </div>
                <!-- Col-->
            </div>
        </div>
    </div>
    <!-- Footer top-->

    <div class="footer-bottom">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 offset-xl-2">
                    <p>All rights reserved {{ date('Y') }}<img src="{{ asset('assets/site/images/icons/icon-hexagon-footer.svg') }}" alt="Hexagon">Made with love</p>
                </div>
            </div>
        </div>
    </div>
</footer>