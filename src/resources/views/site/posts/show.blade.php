@extends('layouts.site')

@php /** @var \App\Entities\Post\Post $post */ @endphp

@section('content')
    <section class="page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 offset-xl-2">
                    <div class="blog-content">

                        <nav class="hidden-991">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('site.home') }}">@lang('main.home')</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('site.blog') }}">@lang('posts.blog')</a></li>
                                <li class="breadcrumb-item">{{ $post->getTitle()  }}</li>
                            </ol>
                        </nav>
                        <!-- Breadcrumb-->

                        <div class="blog-intro">
                            <h1 class="blog-title">{{ $post->getTitle() }}</h1>
                            <span class="blog-date">{{ $post->getCreatedAt()->format('d.m.Y') }}</span>
                            <div class="blog-cover-image">
                                <img src="{{ $post->getCover()->getUrl() }}" alt="{{ $post->getTitle() }}">
                                <!-- <span class="source">Image Credits: Brian Heater</span> -->
                            </div>
                        </div>
                        <!-- Blog intro-->

                        <div class="editor-body">
                            {!! $post->getContent() !!}
                        </div>
                        <br>
                        <!-- Editor body-->

                        <a class="service-item" href="service-inner.html">
                            <span class="title">Bulud infrastrukturu</span>
                            <span class="subtitle">resurs elastikliyi</span>
                            <span class="price">199 AZN-dan<i class="icon-arrow-right"></i></span>
                        </a>
                        <!-- Service item-->

                        @if (filled($latestRandomPost))
                            <div class="blog-article flex">
                                <div class="image masked">
                                    <a href="{{ route('site.blog.show', ['slug' => $latestRandomPost->getSlug()]) }}">
                                        <img src="{{ $latestRandomPost->getCover()->getUrl() }}" alt="{{ $latestRandomPost->getTitle() }}">
                                    </a>
                                </div>
                                <div class="info">
                                    <span class="date">{{ $latestRandomPost->getCreatedAt()->format('d.m.Y') }}</span>
                                    <a class="title" href="{{ route('site.blog.show', ['slug' => $latestRandomPost->getSlug()]) }}">{{ $latestRandomPost->getTitle() }}</a>

                                    <div class="read-more">
                                        <a href="{{ route('site.blog.show', ['slug' => $latestRandomPost->getSlug()]) }}">@lang('posts.read-more')<i class="icon-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <!-- Blog article-->

                        @if (filled($gallery = $post->getGallery()))
                        <div class="blog-gallery">
                            <div class="gallery-top">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                        @foreach($gallery as $item)
                                            <div class="swiper-slide">
                                                <div class="swiper-lazy" data-background="{{ $item->getUrl() }}"></div>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="swiper-button-prev masked hidden-991">
                                        <i class="icon-arrow-left"></i>
                                    </div>
                                    <div class="swiper-button-next masked hidden-991">
                                        <i class="icon-arrow-right"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- Gallery top-->

                            <div class="gallery-thumbs">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                        @foreach($gallery as $item)
                                            <div class="swiper-slide">
                                                <div class="swiper-lazy" data-background="{{ $item->getUrl('gallery-thumb') }}"></div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!-- Gallery thumbs-->
                        </div>
                        @endif
                        <!-- Blog gallery-->

                        @if(filled($tags = $post->getTags()))
                            <div class="tags">
                                <ul>
                                    <li>@lang('posts.tags')</li>
                                    @foreach($tags as $tag)
                                        <li><a href="{{ route('site.blog.tags.show', ['slug' => $tag->getSlug()]) }}">{{ $tag->getName() }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <!-- Tags-->

                        <div class="blog-actions">
                            <ul class="sticky">
                                <li>
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('site.blog.show', ['slug' => $post->getSlug()]) }}" target="_blank">
                                        <i class="icon-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/intent/tweet?url={{ route('site.blog.show', ['slug' => $post->getSlug()]) }}&text={{ $post->getTitle() }}" target="_blank">
                                        <i class="icon-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ route('site.blog.show', ['slug' => $post->getSlug()]) }}" target="_blank">
                                        <i class="icon-linkedin"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="action-copy" href="" data-copied="@lang('posts.link-copied')">@lang('posts.copy-link')</a>
                                    <input type="text" value="{{ route('site.blog.show', ['slug' => $post->getSlug()]) }}" readonly>
                                </li>
                            </ul>
                        </div>

                        <div class="scroll-down">
                            <i class="icon-arrow-down"></i>
                        </div>
                    </div>
                    <!-- Blog content-->
                </div>
            </div>
        </div>
        <!-- Container fluid-->

        @if (filled($olderPosts))
            <div class="related-blog-posts">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-8 offset-xl-2">
                        <div class="section-header text-center">
                            <h2 class="section-title">@lang('posts.maybe-interesting')</h2>
                        </div>

                        <div class="load-container">
                            <div class="row">
                                @foreach($olderPosts as $olderPost)
                                    <div class="col-lg-4 col-sm-6 post-item" data-created="{{ $olderPost->getCreatedAt() }}">
                                        <div class="blog-post">
                                            <div class="image">
                                                <a href="{{ route('site.blog.show', ['slug' => $olderPost->getSlug()]) }}">
                                                    <img src="{{ $olderPost->getCover()->getUrl() }}" alt="{{ $olderPost->getTitle() }}">
                                                </a>
                                            </div>
                                            <div class="info">
                                                <span class="date">{{ $olderPost->getCreatedAt()->format('d.m.Y') }}</span>
                                                <a class="title" href="{{ route('site.blog.show', ['slug' => $olderPost->getSlug()]) }}">{{ $olderPost->getTitle() }}</a>
                                                <div class="read-more">
                                                    <a href="{{ route('site.blog.show', ['slug' => $olderPost->getSlug()]) }}">@lang('posts.read-more')</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <!-- Col-->
                            </div>
                        </div>
                        <!-- Load container-->

                        <div class="load-more">
                            <a class="btn btn-block" href="{{ route('site.blog.list.xhr')  }}" data-template="triple">@lang('posts.load-more')</a>
                        </div>
                    </div>
                    <!-- Col-->
                </div>
            </div>
        </div>
        @endif
        <!-- Related blog posts-->

        @include('site.partials.have-question')
    </section>
    <!-- Blog inner page-->
@endsection