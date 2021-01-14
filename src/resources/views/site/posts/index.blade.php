@extends('layouts.site')

@php
    /** @var \Illuminate\Database\Eloquent\Collection $posts */
    $firstPost = $posts->shift();
@endphp

@section('content')
    <section class="page blog-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 offset-xl-2">
                    <div class="page-header text-center">
                        <h1 class="page-title">@lang('posts.blog')</h1>
                    </div>

                    <div class="load-container">
                        <div class="posts-chunk">
                            <div class="row">
                                <!-- First post -->
                                <div class="col-12" data-aos="fade-up" data-aos-duration="800">
                                    <div class="blog-article flex">
                                        <div class="image masked">
                                            <a href="{{ route('site.blog.show', ['slug' => $firstPost->getSlug()]) }}">
                                                <img src="{{ $firstPost->getCover()->getUrl() }}" alt="{{ $firstPost->getTitle()  }}">
                                            </a>
                                        </div>
                                        <div class="info">
                                            <span class="date">{{ $firstPost->getCreatedAt()->format('d.m.Y') }}</span>
                                            <a class="title" href="{{ route('site.blog.show', ['slug' => $firstPost->getSlug()]) }}">
                                                {{ $firstPost->getTitle() }}
                                            </a>
                                            <div class="read-more">
                                                <a href="{{ route('site.blog.show', ['slug' => $firstPost->getSlug()]) }}">@lang('posts.read-more')<i class="icon-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Col-->

                                @foreach($posts as $post)
                                <div class="col-lg-4 col-sm-6 post-item" data-aos="fade-up" data-aos-duration="800" data-created="{{ $post->getCreatedAt() }}">
                                    <div class="blog-post">
                                        <div class="image">
                                            <a href="blog-inner.html">
                                                <img src="{{ $post->getCover()->getUrl() }}" alt="{{ $post->getTitle() }}">
                                            </a>
                                        </div>
                                        <div class="info">
                                            <span class="date">{{ $post->getCreatedAt()->format('d.m.Y') }}</span>
                                            <a class="title" href="{{ route('site.blog.show', ['slug' => $post->getSlug()]) }}">{{ $post->getTitle() }}</a>

                                            <div class="read-more">
                                                <a href="{{ route('site.blog.show', ['slug' => $post->getSlug()]) }}">@lang('posts.read-more')</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                    <!-- Load container-->

                    <div class="load-more">
                        <a class="btn btn-block" href="{{ route('site.blog.list.xhr')  }}">@lang('posts.load-more')</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container fluid-->

        @include('site.partials.have-question')
    </section>
    <!-- Blog page-->
@endsection

@push('scripts')
    <script>
        $('.load-more a').on('click', function (e) {
            e.preventDefault();
            const link = $(this);
            const container = $('.load-container');
            const data = {timestamp: $('.post-item:last').data('created')};
            $.get(link.attr('href'), data, function (resp) {
                if (!resp.status) {
                    link.fadeOut();
                    return false;
                }
                container.append(resp.data);
            });
        });
    </script>
@endpush