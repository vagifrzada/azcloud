@extends('layouts.site')

@section('meta_title', __('main.search'))

@section('content')
    <section class="page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 offset-xl-2">
                    <div class="page-header">
                        <h1 class="page-title">@lang('main.search-result')</h1>
                    </div>

                    <div class="search-form v2">
                        <form action="{{ route('site.search') }}" method="GET">
                            <div class="form-group">
                                <label for="search-field">@lang('main.search')</label>
                                <input class="form-control" type="text" value="{{ session('query') }}" id="search-field" name="q" placeholder="@lang('main.search') ..." autocomplete="off">
                            </div>
                            <button class="submit-search" type="submit">
                                <img src="{{ asset('assets/site/images/icons/icon-search.svg') }}" alt="Icon search">
                            </button>
                            <div class="search-count">
                                <p>{{ $resultCount  }} @lang('main.search-result-found')</p>
                            </div>
                        </form>
                    </div>
                    <!-- Search form-->

                    <div class="search-results">
                        @if (empty($data))
                            <p>@lang('main.search_not_found')</p>
                        @else
                            <div class="load-container">
                                @foreach($data as $item)
                                    <div class="search-result">
                                        <p class="label">{{ trans('main.type_' . $item['type']) ?? '' }}</p>
                                        <a class="value" href="{{ searchRoute($item) }}" target="_blank">{{ $item['title'] }}</a>
                                    </div>
                                @endforeach
                            </div>

                            @if ($canLoadMore)
                                <div class="load-more-search">
                                    <a class="btn btn-primary" href="#" data-page="1">@lang('posts.load-more')</a>
                                </div>
                            @endif
                        @endif
                     </div>
                    <!-- Search results-->
                </div>
            </div>
        </div>
        <!-- Container fluid-->

      @include('site.partials.have-question')
    </section>
@endsection

@push('scripts')
    <script>
        $('.load-more-search a').click(function (e) {
            e.preventDefault();
            const button = $(this);
            let page = parseInt(button.attr('data-page'));
            page++;
            button.attr('data-page', page);
            let url = window.location.href  + '&page=' + page;
            $.get(url, {}, function (resp) {
                if (resp.success) {
                    if (resp.html === '') {
                        button.fadeOut();
                        return false;
                    }
                    $('.search-results .load-container').append(resp.html);
                }
            });
        });
    </script>
@endpush