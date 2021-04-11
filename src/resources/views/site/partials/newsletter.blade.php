<div class="subscribe-to-rss ptb-11" id="newsletter-form">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-8 offset-xl-2">
                <h3 class="section-title text-center">@lang('main.subscribe_to_newsletter')</h3>
                <form action="{{ route('site.newsletter') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="newsletter-email">@lang('main.email')</label>
                        <input class="form-control" id="newsletter-email" type="email" name="email" placeholder="example@example.com" required>
                    </div>
                    <button class="btn btn-cyan with-icon" type="submit">
                        @lang('main.subscribe') <i class="icon-arrow-right"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Subscribe to RSS-->