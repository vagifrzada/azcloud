<div class="service-prices ptb-11" id="prices" data-aos="fade-in" data-aos-duration="800">
    <div class="bg-video">
        <video class="lazy" autoplay muted loop playsinline>
            <source data-src="{{ asset('assets/site/videos/network.mp4') }}" type="video/mp4">
        </video>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-8 offset-xl-2">
                <div class="section-header">
                    <h2 class="section-title">@lang('products.prices')</h2>
                </div>

                <div class="filters-group">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="fields-group-wrapper">
                                <p class="group-label">@lang('products.family')</p>
                                <div class="fields-group">
                                    @foreach($families as $family)
                                        <div>
                                            <div class="field-item">
                                                <input type="radio"
                                                       name="service-os-family"
                                                       value="{{ $family['value'] }}"
                                                       id="os-family-{{ $family['value'] }}" @if ($loop->first) checked @endif>
                                                <label for="os-family-{{ $family['value'] }}">
                                                    {{ strtoupper($family['value']) }} - {{ $family['label'] }}
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- Col-->

                        <div class="col-lg-4">
                            <div class="fields-group-wrapper">
                                <p class="group-label">@lang('products.os')</p>
                                <div class="fields-group">
                                    <div>
                                        <div class="field-item">
                                            <input type="radio" name="service-os" value="linux" id="os-linux" checked>
                                            <label for="os-linux">Linux</label>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="field-item">
                                            <input type="radio" name="service-os" value="windows" id="os-windows">
                                            <label for="os-windows">Windows</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Col-->
                    </div>
                </div>
                <!-- Filters group-->

                <div class="prices-table">
                    <table>
                        <thead>
                        <tr>
                            <th>@lang('products.name')</th>
                            <th>@lang('products.cpu')</th>
                            <th>@lang('products.ram')</th>
                            <th>@lang('products.storage')</th>
                            <th>@lang('products.price')</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>

                            @foreach($prices as $price)
                                <?php $os = ((bool) $price->isWindowsOnly) ? 'windows' : 'linux' ?>
                                <tr data-os="{{ $os }}"
                                    data-family="{{ $os }}-{{ $price->family }}">
                                    <td>{{ $price->name }}</td>
                                    <td>{{ $price->cpu }}</td>
                                    <td>{{ $price->ram }} GB</td>
                                    <td>{{ $price->disk }} GB</td>
                                    <td>{{ number_format($price->hourly_price, 5) }} AZN/hour</td>
                                    <td>
                                        <a class="purchase" target="_blank" href="{{ settings('azcloud_console_url') }}">
                                            @lang('main.buy')
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Prices table-->
            </div>
        </div>
    </div>
</div>
