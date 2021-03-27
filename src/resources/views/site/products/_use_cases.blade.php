<div class="use-cases" id="use-cases" data-aos="fade-in" data-aos-duration="800">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-8 offset-xl-2">
                <div class="row">
                    <div class="col-md-5">
                        <div class="use-cases__img masked">
                            <img src="{{ optional($product->getCasesCover())->getUrl() ?? asset('assets/site/images/values-bg.jpg') }}" alt="Use case">
                        </div>
                    </div>
                    <!-- Inner col-->

                    <div class="col-md-7">
                        <div class="use-cases__content">
                            <div class="section-header">
                                <h3 class="section-title">@lang('products.use_cases')</h3>
                                <p class="subtitle">{{ $product->getUseCasesDescription() }}</p>
                            </div>

                            <ul class="use-cases__examples">
                                @foreach($cases as $case)
                                    <li class="use-case__example" data-src="{{ optional($case->getCover())->getUrl() }}">
                                        {{ $case->title }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- Inner col-->
                </div>
            </div>
            <!-- Outer col-->
        </div>
    </div>
</div>