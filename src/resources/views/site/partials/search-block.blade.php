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
                    <form action="#" method="GET">
                        <div class="form-group">
                            <label for="search-field">Search</label>
                            <input class="form-control" type="text" id="search-field" placeholder="Search" autocomplete="off">
                        </div>
                        <button class="submit-search" type="submit">
                            <img src="{{ asset('assets/site/images/icons/icon-search-white.svg') }}" alt="Icon search">
                        </button>
                        <div class="search-examples hidden-991">
                            <span>Ex.</span>
                            <a href="https://localhost:8080?q=servers">Servers</a>
                            <a href="https://localhost:8080?q=datacenters">Datacenters</a>
                            <a href="https://localhost:8080?q=video-konfrans">Video konfrans</a>
                            <a href="https://localhost:8080?q=ip-telefoniya">IP telefoniya</a>
                        </div>
                    </form>
                </div>
                <!-- Search form-->
            </div>
        </div>
    </div>
</div>
<!-- Site search-->