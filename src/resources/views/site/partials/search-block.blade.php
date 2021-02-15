<div class="search-block">
    <div class="bg-video">
        <video class="lazy" autoplay muted loop playsinline>
            <source data-src="{{ asset('assets/site/videos/network.mp4') }}" type="video/mp4">
        </video>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-8 offset-xl-2">
                <div class="search-form">
                    <form action="{{ route('site.search') }}" method="GET">
                        <div class="form-group">
                            <label for="search-field">@lang('main.search')</label>
                            <input class="form-control" type="text" required id="search-field" name="q" placeholder="@lang('main.search')" autocomplete="off">
                        </div>
                        <button class="submit-search" type="submit">
                            <img src="{{ asset('assets/site/images/icons/icon-search-white.svg') }}" alt="Icon search">
                        </button>
                        <div class="search-examples hidden-991">
                            <span>Ex.</span>
                            <a href="/search?q=Servers">Servers</a>
                            <a href="/search?q=Datacenters">Datacenters</a>
                            <a href="/search?q=Video konfrans">Video konfrans</a>
                        </div>
                    </form>
                </div>
                <!-- Search form-->
            </div>
        </div>
    </div>
</div>
<!-- Site search-->