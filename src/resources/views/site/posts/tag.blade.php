@extends('layouts.site')

@section('meta_title', sprintf('%s: #%s', __('posts.tag'), $tag->getName()))

@section('content')
    <section class="page blog-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 offset-xl-2">
                    <div class="page-header text-center">
                        <h1 class="page-title">@lang('posts.tag') - {{ $tag->getName() }} (#{{$tag->getSlug()}})</h1>
                    </div>

                    <div class="load-container">
                        <div class="posts-chunk">
                            <div class="row">

                                @foreach($tag->posts as $post)
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
                </div>
            </div>
        </div>
        <!-- Container fluid-->

        @include('site.partials.have-question')
    </section>
    <!-- Blog page-->
@endsection