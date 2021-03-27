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
                                        <p class="label">@lang('main.sitemap')</p>
                                        <ul>
                                            @foreach($menu as $item)
                                                <li><a href="{{ $item->getUrl() }}">{{ $item->getTitle() }}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <!-- Col-->

                                <div class="col-sm-6">
                                    <div class="footer-links">
                                        <p class="label">@lang('main.our_services')</p>
                                        <ul>
                                            @foreach($footerProducts as $product)
                                                @if (filled($category = $product->getCategory()))
                                                    <li>
                                                        <a href="{{ route('site.products.show', ['slug' => $product->getSlug(), 'category' => $category->getSlug()]) }}" target="_blank">
                                                            {{ $product->getTitle() }}
                                                        </a>
                                                    </li>
                                                @endif
                                            @endforeach
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
                    <p>@lang('footer.all_rights') &nbsp; {{ date('Y') }}
                        <img src="{{ asset('assets/site/images/icons/icon-hexagon-footer.svg') }}" alt="Hexagon">
                        @lang('footer.additional_text')
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>