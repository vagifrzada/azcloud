<div class="row">
    @foreach($posts as $post)
        <div class="col-lg-4 col-sm-6 post-item" data-created="{{ $post->getCreatedAt() }}">
            <div class="blog-post">
                <div class="image">
                    <a href="{{ route('site.blog.show', ['slug' => $post->getSlug()]) }}">
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
<!-- Col-->
</div>