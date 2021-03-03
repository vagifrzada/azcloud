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
                    <p>@lang('main.apply_label')</p>
                    <a class="btn btn-white" href="{{ route('site.contact') }}">@lang('main.apply')</a>
                </div>
            </div>
        </div>
    </div>
</div>

@include('site.partials.seo-block')