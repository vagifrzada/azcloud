@php use App\Plugins\Page\PagePlugin; @endphp
<div class="service-calculator ptb-11">
    <style type="text/css">
        .calculator select {
            display: block;
            width: 100%;
            color: #fff;
            background: transparent;
            border: none;
            outline: none;
        }
        .calculator option { color: #000;}
    </style>

    <div class="bg-video">
        <video class="lazy" autoplay muted loop playsinline>
            <source data-src="{{ asset('assets/site/videos/network.mp4') }}" type="video/mp4">
        </video>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-8 offset-xl-2">
                <div class="calculator flex">
                    <h3 class="section-title">{{ $page->getTitle() }}</h3>

                    <div class="left">
                        <form action="#" method="POST">
                            <h3 class="form-group-title">{{ $page->getDescription() }}</h3>

                            @if (filled($item = PagePlugin::getByIdentity(['identity' => 'calculator-os'])))
                            <div class="fields-group-wrapper">
                                <p class="group-label">{{ $item->getTitle() }}</p>
                                <div class="fields-group">
                                    <div>
                                        <div class="field-item">
                                            <input type="radio" name="os" value="linux" id="os-linux" checked>
                                            <label for="os-linux">{{ $item->getDescription() }}</label>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="field-item">
                                            <input type="radio" name="os" value="windows" id="os-windows">
                                            <label for="os-windows">{{ strip_tags($item->getContent()) }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif

                            <?php $itemBlock = optional(PagePlugin::getByIdentity(['identity' => 'calculator-vm-family'])) ?>
                            <div class="fields-group-wrapper">
                                <p class="group-label">{{ $itemBlock->getTitle() }}</p>
                                <div class="fields-group">
                                    @foreach($vmFamilies as $item)
                                        <div>
                                            <div class="field-item">
                                                <input type="radio" name="os-family" value="{{ $item->family  }}" id="os-family-{{ $item->family }}" @if ($item->family === 'c') checked @endif>
                                                <label for="os-family-{{ $item->family }}">{{ strtoupper($item->family) }}</label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="form-info">
                                {!! $page->getContent() !!}
                            </div>

                            <div class="fields-group-wrapper">
                                <p class="group-label">{{ $itemBlock->getDescription() }}</p>
                                <div class="fields-group">
                                    <div>
                                        <div class="field-item">
                                            <select class="custom-select" name="vm">
                                                @foreach($vmList as $vmItem)
                                                    <option value="{{ $vmItem->hourly_price }}" data-os="{{ $vmItem->os }}" data-family="{{ $vmItem->os }}-{{ $vmItem->family }}" @if ($loop->first) selected @endif>
                                                        {{ $vmItem->label }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="fields-group-wrapper">
                                <div class="fields-group divided">
                                    <div>
                                        <p class="group-label">@lang('calculator.quantity')</p>
                                        <div class="field-item">
                                            <input class="number-input" type="number" name="vm-qty" value="1">
                                            <div class="field-controls">
                                                <button class="decrement" type="button">−</button>
                                                <button class="increment" type="button">+</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="group-label">@lang('calculator.duration')</p>
                                        <div class="field-item">
                                            <input class="number-input" type="number" name="vm-duration" value="720">
                                            <select class="custom-select" name="vm-duration-type">
                                                <option value="hours">@lang('calculator.hours')</option>
                                                <option value="weeks">@lang('calculator.weeks')</option>
                                                <option value="months">@lang('calculator.months')</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if (filled($disk = PagePlugin::getByIdentity(['identity' => 'calculator-storage'])))
                                <h3 class="form-group-title">{{ $disk->getTitle() }}</h3>

                                <div class="fields-group-wrapper">
                                    <p class="group-label">{{ $disk->getDescription() }}</p>
                                    <div class="fields-group">
                                        @foreach($storageFamilies as $item)
                                            <div>
                                                <div class="field-item">
                                                    <input type="radio" name="disc-family" value="{{ $item->family }}" id="{{ $item->family }}" @if (str_contains($item->family, 'standart')) checked @endif>
                                                    <label for="{{ $item->family }}">{{ ucfirst($item->family) }}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="fields-group-wrapper">
                                    <p class="group-label">{{ strip_tags($disk->getContent()) }}</p>
                                    <div class="fields-group">
                                        <div>
                                            <div class="field-item">
                                                <select class="custom-select" name="disc-size">
                                                    @foreach($storageList as $storage)
                                                        <option value="{{ $storage->hourly_price }}" data-disc-family="{{ $storage->family }}">
                                                            {{ $storage->label }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="fields-group-wrapper">
                                    <div class="fields-group divided">
                                        <div>
                                            <p class="group-label">@lang('calculator.quantity')</p>
                                            <div class="field-item">
                                                <input class="number-input" type="number" name="disc-qty" value="0">
                                                <div class="field-controls">
                                                    <button class="decrement" type="button">−</button>
                                                    <button class="increment" type="button">+</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <p class="group-label">@lang('calculator.duration')</p>
                                            <div class="field-item">
                                                <input class="number-input" type="number" name="disc-duration" value="720">
                                                <select class="custom-select" name="disc-duration-type">
                                                    <option value="hours">@lang('calculator.hours')</option>
                                                    <option value="weeks">@lang('calculator.weeks')</option>
                                                    <option value="months">@lang('calculator.months')</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                        </form>
                        <!-- Form-->
                    </div>
                    <!-- Left-->

                    <div class="right">
                        <div class="price-block sticky">
                            @if (filled($price = PagePlugin::getByIdentity(['identity' => 'calculator-total-price'])))
                                <p class="total-price">{{ $price->getTitle() }}</p>
                            @endif
                            <p class="price"><span>0</span> AZN</p>
                            <a class="btn btn-white" href="{{ settings('azcloud_console_url') }}" target="_blank">@lang('main.buy')</a>
                        </div>
                    </div>
                    <!-- Right-->
                </div>
                <!-- Calculator-->
            </div>
        </div>
    </div>
</div>
<!-- Service calculator-->