<div class="services-grid flex" data-aos="fade-in" data-aos-duration="800">
    @foreach($categories as $category)
        <div class="service-card">
            <div class="service-card__bg">
                <img src="{{ optional($category->getCover())->getUrl() }}" alt="Service thumb">
            </div>
            <div class="service-card__body">
                <a class="title" href="javascript:void(0)">{{ $category->getTitle() }}</a>
                <a class="subtitle" href="javascript:void(0)">{{ $category->getDescription() }}</a>

                <ul class="service-categories">
                    @foreach($category->products as $product)
                        <li>
                            <a href="{{ route('site.products.show', ['category' => $category->getSlug(), 'slug' => $product->getSlug()]) }}">
                                {{ $product->getTitle() }}<span>{{ $product->getSubtitle() }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endforeach
</div>

