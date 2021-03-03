<div class="services-grid flex">
    @foreach($categories as $category)
        <div class="service-card">
            <div class="service-card__bg">
                <img src="{{ optional($category->getCover())->getUrl() }}" alt="Service thumb">
            </div>
            <div class="service-card__body">
                <span class="title">{{ $category->getTitle() }}</span>
                <span class="subtitle">{{ $category->getDescription() }}</span>

                <ul class="service-categories">
                    @foreach($category->products as $product)
                        <li data-toggle="tooltip" title="{{ $product->getSubtitle() }}">
                            <a href="{{ route('site.products.show', ['category' => $category->getSlug(), 'slug' => $product->getSlug()]) }}">
                                {{ $product->getTitle() }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endforeach
</div>


