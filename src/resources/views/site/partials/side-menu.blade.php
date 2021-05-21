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
                                    @foreach($menu as $item)
                                        <li>
                                            <a class="{{ !str_contains($item->getUrl(), 'services') ? 'menu' : 'services' }}-link" href="{{ $item->getUrl() }}">{{ $item->getTitle() }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </nav>
                        </div>
                        <!-- Col-->

                        <div class="col-md-9">
                            <div class="menu-right-container default">
                                <div class="services-flips flex">

                                    @foreach($menuItems as $item)
                                    <div class=src/resources/views/site/pages/about.blade.php"service-flip">
                                        <div class="rotator">
                                            <div class="flip-front">
                                                <a class="flip-item" href="{{ $item->getUrl() ?? 'javascript:void(0)' }}" @if (filled($item->getUrl())) target="_blank" @endif>
                                                    <span class="title">{{ $item->getTitle() }}</span>
                                                    <span class="subtitle">{{ $item->getSubtitle() }}</span>
                                                    <span class="price">{{ $item->getDescription() }}<i class="icon-arrow-right"></i></span>
                                                </a>
                                            </div>
                                            <div class="flip-back">
                                                <div class="flip-bg cover-center" style="background-image: url({{ optional($item->getCover())->getUrl() }})"></div>
                                                <a class="flip-item" href="{{ $item->getUrl() ?? 'javascript:void(0)' }}" @if (filled($item->getUrl())) target="_blank" @endif>
                                                    <span class="title">{{ $item->getTitle() }}</span>
                                                    <span class="subtitle">{{ $item->getSubtitle() }}</span>
                                                    <span class="price">{{ $item->getDescription() }}<i class="icon-arrow-right"></i></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

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