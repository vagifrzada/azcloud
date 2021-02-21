@extends('layouts.admin')

@push('styles')
    <style>
        .options fieldset {border: 2px dashed #ddd; padding: 10px; margin-bottom: 17px}
    </style>
@endpush

@section('content')

    <form id="bundle-edit" method="POST" action="{{ route('admin.product-bundles.update', ['product_bundle' => $bundle->id]) }}">
        @csrf
        @method('PUT')
      <div class="row">
        <div class="col-lg-8">
            <div class="panel">
                <div class="panel-body">

                    <ul class="nav nav-tabs">
                        @foreach ($supportedLocales as $locale => $info)
                            <li class="nav-item">
                                <a class="nav-link {{ $locale == config('app.locale') ? 'active' : null }}" href="#{{$locale}}" data-toggle="tab">
                                    {{ $info['name'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>

                    <div class="tab-content mt-4">
                        @foreach ($supportedLocales as $locale => $info)
                            <?php $translation = $bundle->translate($locale); ?>
                        <div class="tab-pane {{ $locale == config('app.locale') ? 'active' : null }}" id="{{ $locale }}">
                            <div class="row">
                                <div class="col-lg-12">

                                    <div class="form-group form-material title required">
                                        <label class="form-control-label" for="title-{{ $locale }}">Title</label>
                                        <input type="text" id="title-{{ $locale }}" class="form-control" name="title[{{ $locale }}]" aria-required="true" value="{{ $translation->title }}">
                                        @if ($errors->has('title.' . $locale))
                                            <p class="help-block help-block-error">{{ $errors->first('title.' . $locale) }}</p>
                                        @endif
                                    </div>

                                    <div class="form-group form-material description">
                                        <label class="form-control-label" for="description-{{ $locale }}">Description</label>
                                        <textarea rows="10" name="description[{{ $locale  }}]" id="description-{{ $locale }}" class="form-control">{!! $translation->description !!}</textarea>
                                        @if ($errors->has('description.' . $locale))
                                            <p class="help-block help-block-error">{{ $errors->first('description.' . $locale) }}</p>
                                        @endif
                                    </div>

                                    <div class="form-group form-material options">
                                        <?php $options = $translation->getOptions();  ?>
                                        <label class="form-control-label">Additional options (Not required)</label>
                                        <br><br>

                                         <div class="options-container-{{ $locale }}">
                                             @foreach($options as $key => $option)
                                             <fieldset data-index="{{ $key }}">
                                                 <p>Title</p>
                                                 <input type="text" class="form-control" name="options[{{ $locale }}][{{ $key }}][title]" value="{{ $option['title'] }}">
                                                 <p>Description</p>
                                                 <textarea name="options[{{ $locale }}][{{ $key }}][description]" cols="10" rows="4" class="form-control">{!! $option['description'] !!}</textarea>
                                                 @if ($loop->iteration > 1)
                                                     <button class="btn btn-xs btn-round btn-danger float-right delete-option">Delete</button>
                                                 @endif
                                             </fieldset>
                                             <br>
                                             @endforeach
                                         </div>

                                            <br>
                                            <br>
                                            <button class="btn btn-xs btn-round btn-success float-right add-option">Add option</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach

                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Settings</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group form-material price">
                        <label class="form-control-label" for="price">Price (Not required)</label>
                        <input type="number" step="any" id="price" min="1" class="form-control" name="price" aria-required="true" value="{{ $bundle->getPrice() }}">
                        @if ($errors->has('price'))
                            <p class="help-block help-block-error">{{ $errors->first('slug') }}</p>
                        @endif
                    </div>

                    <div class="form-group form-material status required">
                        <label class="form-control-label" for="status">Status</label>
                        <input type="hidden" name="status"  value="0">
                        <input id="status" type="checkbox" checked data-plugin="switchery" name="status" value="{{ old('status', 1)  }}">
                        @if ($errors->has('status'))
                            <p class="help-block help-block-error">{{ $errors->first('status')  }}</p>
                        @endif
                    </div>
                    <br><br>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-round">Update !</button>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </form>

@endsection

@push('scripts')
    <script>
        $(document).on('click', 'button.add-option', function (e) {
            e.preventDefault();
            let container;

            locales.forEach(function (locale) {
                container = $('.options-container-' + locale);
                let index = container.find('fieldset').length;
                container.append(`
                 <fieldset data-index="${index}">
                     <p>Title</p>
                     <input type="text" class="form-control" name="options[${locale}][${index}][title]">
                     <p>Description</p>
                     <textarea name="options[${locale}][${index}][description]" cols="10" rows="3" class="form-control"></textarea>
                     <button class="btn btn-xs btn-round btn-danger float-right delete-option">Delete</button>
                 </fieldset>
            `);
            });
        })

        $(document).on('click', 'button.delete-option', function (e) {
            e.preventDefault();
            let fieldset = $(this).parent('fieldset');
            let container;

            locales.forEach(function (locale) {
                container = $('.options-container-' + locale);
                container.find('fieldset[data-index="'+ fieldset.attr('data-index') +'"]').remove();
            });
        })
    </script>
@endpush
