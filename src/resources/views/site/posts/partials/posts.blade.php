@php
    /** @var \Illuminate\Database\Eloquent\Collection $posts */
    $firstPost = $posts->shift();
@endphp
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
