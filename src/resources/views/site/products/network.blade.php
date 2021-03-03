@extends('layouts.site')

@php
    /** @var \App\Entities\Product\Product $product **/
    $firstParagraph = getFirstParagraph($product->getDescription());
    $editorBodyDescription = str_replace($firstParagraph, null, $product->getDescription());
@endphp

@section('meta_title', $meta['title'] ?? $product->getTitle())
@section('meta_keywords', $meta['keywords'] ?? '')
@section('meta_description', $meta['description'] ?? '')

@section('content')

    <section class="page">
        <div class="service-intro" data-aos="fade-in" data-aos-duration="800">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-8 offset-xl-2">
                        <div class="service-preview flex">
                            <div class="left">
                                <h1 class="title">{{ $category->getTitle() }}</h1>
                                <h2 class="subtitle">
                                    {{ $category->getDescription() }}
                                </h2>

                                <ul class="service-categories">
                                    @foreach($category->products->where('id', '<>', $product->getId()) as $child)
                                        <li>
                                            <a href="{{ route('site.products.show', ['category' => $category->getSlug(), 'slug' => $child->getSlug()]) }}">
                                                {{ $child->getTitle() }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="right">
                                <img src="{{ optional($product->getCover())->getUrl() ?? asset('assets/site/images/intro-slider/image0.png') }}" alt="Service image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service intro-->

        @if (filled($firstParagraph))
            <div class="service-description">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-8 offset-xl-2">
                            <div class="first-chunk">
                                <p>
                                    {{ strip_tags($firstParagraph) }}
                                    @if (filled($editorBodyDescription))
                                        <button class="expand">@lang('products.show_more')</button>
                                    @endif
                                </p>
                            </div>

                            <div class="rest-chunk">
                                <div class="editor-body">
                                    {!! $editorBodyDescription !!}
                                </div>
                                <button class="roll-up">@lang('products.show_less')</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <!-- Service description-->

        @if (filled($children = $product->children))
        <div class="service-subtype-info ptb-11">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-8 offset-xl-2">
                        <ul class="service-categories">
                            @foreach($children as $child)
                            <li>
                                <a href="{{ route('site.products.show', ['category' => $category->getSlug(), 'slug' => $child->getSlug()]) }}">
                                    {{ $child->getTitle() }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                        <div class="editor-body">
                            {!! optional($children->first())->getDescription() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <!-- Service subtype-->

        <div class="service-nav sticky-nav hidden-1200" id="service-nav">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-8 offset-xl-2">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#benefits">@lang('products.benefits')</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#use-cases">@lang('products.use_cases')</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#main-features">@lang('products.features')</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#bundles">@lang('products.prices')</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service nav-->

        <div class="service-benefits flat ptb-14" id="benefits" data-aos="fade-in" data-aos-duration="800">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-8 offset-xl-2">
                        <div class="section-header">
                            <h2 class="section-title">@lang('products.benefits')</h2>
                        </div>

                        <div class="benefits-list flex">

                            @foreach($product->benefits as $benefit)
                                <div class="benefits-list__item">
                                    <div class="benefits-list__icon">
                                        <img src="{{ optional($benefit->getCover())->getUrl() }}" alt="Icon">
                                    </div>
                                    <div class="benefits-list__info">
                                        <p class="benefits-list__label">{{ $benefit->title }}</p>
                                        <p class="benefits-list__desc">
                                            {{ $benefit->description }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Benefits-->

        @include('site.products._use_cases', ['product' => $product])
        <!-- Use cases-->

        @include('site.products._main_features', ['product' => $product])
        <!-- Main features-->

        <div class="service-bundles ptb-11" id="bundles" data-aos="fade-in" data-aos-duration="800">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-8 offset-xl-2">

                        <div class="service-bundles-list">
                            <div class="row">
                                @foreach($product->bundles as $index => $bundle)
                                    <div class="col-lg-4 col-sm-6">
                                    <div class="service-bundle flex">
                                        <div class="textures">
                                            <div class="texture masked"></div>
                                            <div class="texture masked"></div>
                                        </div>
                                        <p class="name">{{ $product->getTitle() }}</p>
                                        <p class="level">{{ $bundle->title }}</p>

                                        <?php
                                            $firstPar = getFirstParagraph($bundle->description);
                                            $morePar = str_replace($firstPar, null, $bundle->description);
                                        ?>

                                        <div class="bundle-description">{!! $firstPar !!}</div>
                                        <div class="bundle-usage">{!! $morePar !!}</div>

                                        <div class="bundle-params">
                                            <div class="params-accordion">
                                                @foreach($bundle->getOptions() as $option)
                                                    <div class="accordion-item">
                                                        <a href="#accordion-{{ $index }}-{{ $loop->index }}" data-toggle="collapse">{{ $option['title'] }}</a>
                                                        <div class="collapse" id="accordion-{{ $index }}-{{ $loop->index }}">
                                                            <div class="collapse-content">
                                                                <p>{{ $option['description'] }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <button class="collapse-all">@lang('products.collapse_all')</button>
                                        </div>
                                        <div class="bundle-price">
                                            <p class="price">{{ $bundle->getPrice() }}</p>
                                            <div class="currency-period">
                                                <p class="currency">AZN</p>
                                                <p class="period">/ @lang('products.per_month')</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Service bundle-->
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- Service bundles list-->
                    </div>
                </div>
            </div>
        </div>
        <!-- Service bundles section-->

        @include('site.partials.seo-block')
        <!-- Azcloud / aztelecom (seo)-->
    </section>
@endsection