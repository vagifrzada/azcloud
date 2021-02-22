@extends('layouts.admin')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/remark/global/vendor/fileinput/css/fileinput.min.css') }}">
    <style>
        .additional_features fieldset {border: 2px dashed #ddd; padding: 10px; margin-bottom: 17px}
    </style>
@endpush

@section('content')

    <form id="{{ $category->getSlug() }}-store" method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" value="{{ $category->getId() }}" name="category">

        <div class="row">
            <div class="col-lg-8">
                <div class="panel">
                    <div class="panel-body">
                        <h3>2. Creating product for category: {{$category->getTitle()}}</h3>
                        <br>

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
                                <div class="tab-pane {{ $locale == config('app.locale') ? 'active' : null }}" id="{{ $locale }}">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group form-material content">
                                                <label class="form-control-label" for="content-{{ $locale }}">Description</label>
                                                <textarea rows="10" name="description[{{ $locale  }}]" id="content-{{ $locale }}" class="form-control">{!! old('description.' . $locale) !!}</textarea>
                                                @if ($errors->has('content.' . $locale))
                                                    <p class="help-block help-block-error">{{ $errors->first('content.' . $locale) }}</p>
                                                @endif
                                            </div>

                                            <h3>Use Cases</h3>
                                            <br>

                                            <div class="form-group form-material use_cases_description">
                                                <textarea rows="2" name="use_cases_description[{{ $locale }}]" placeholder="Enter use cases description" id="description" class="form-control">{!! old('use_cases_description.' . $locale) !!}</textarea>
                                            </div>

                                            <div class="form-group form-material meta">
                                                <fieldset>
                                                    <legend>Meta tags</legend>
                                                    <br>
                                                    <label class="form-control-label" for="meta-title-{{ $locale }}">Meta title</label>
                                                    <input type="text" name="meta[{{ $locale }}][title]" id="meta-title-{{ $locale }}" class="form-control">
                                                    <br>
                                                    <label class="form-control-label" for="meta-keywords-{{ $locale }}">Meta keywords</label>
                                                    <input type="text" name="meta[{{ $locale  }}][keywords]" id="meta-keywords-{{ $locale }}" class="form-control">
                                                    <br>
                                                    <label class="form-control-label" for="meta-description-{{ $locale }}">Meta description</label>
                                                    <textarea name="meta[{{ $locale }}][description]" id="meta-description-{{ $locale }}" class="form-control"></textarea>
                                                </fieldset>
                                            </div>

                                            <h3>Additional features</h3>
                                            <br>
                                            <div class="form-group form-material additional_features">
                                                <div class="features-container-{{ $locale }}">
                                                    <fieldset data-index="0">
                                                        <p>Feature:</p>
                                                        <input name="additional_features[{{ $locale }}][title]" class="form-control">
                                                    </fieldset>
                                                </div>

                                                <br>
                                                <br>
                                                <button class="btn btn-xs btn-round btn-success float-right add-feature">Add feature</button>
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
                        <div class="form-group form-material title required">
                            <label for="title" class="form-control-label">Name of the product (Required)</label>
                            <input id="title" type="text" name="title" class="form-control" required value="{{ old('title') }}">
                            @if ($errors->has('title'))
                                <p class="help-block help-block-error">{{ $errors->first('title') }}</p>
                            @endif
                        </div>


                        @if (str_contains($category->getSlug(), 'network'))
                            <div class="form-group form-material parent_id required">
                                <label class="form-control-label" for="parent_id">Parent product</label>
                                <select name="parent_id" id="parent_id" class="form-control">
                                    <option value="0">Default</option>
                                    @foreach($products as $product)
                                        <option value="{{ $product->getId() }}">{{ $product->getTitle() }}</option>
                                        @if (filled($children = $product->children))
                                            @include('admin.products._children', ['children' => $children, 'dash' => 2, 'product' => $product])
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        @endif

                        @if ($category->getSlug() !== 'storage')
                            <div class="form-group form-material bundles required">
                                <label class="form-control-label" for="bundles">Bundles (Required)</label>
                                <select name="bundles[]" id="bundles"
                                        multiple="multiple"
                                        class="form-control"
                                        data-selectable="true">
                                    @foreach($bundles as $bundle)
                                        <option value="{{ $bundle->id }}">{{ $bundle->title }} (ID: {{ $bundle->id }})</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('bundles'))
                                    <p class="help-block help-block-error">{{ $errors->first('bundles')  }}</p>
                                @endif
                            </div>
                        @endif

                        <div class="form-group benefits_cover">
                            <label for="benefits_cover">Benefits cover image (Optional)</label>
                            <input id="benefits_cover" type="file" name="benefits_cover" class="form-control" data-preview-file-type="text">
                            @if ($errors->has('benefits_cover'))
                                <p class="help-block help-block-error">{{ $errors->first('benefits_cover') }}</p>
                            @endif
                        </div>

                        <div class="form-group form-material benefits required">
                            <label class="form-control-label" for="bundles">Benefits (Required)</label>
                            <select name="benefits[]" id="benefits"
                                    multiple="multiple"
                                    class="form-control"
                                    data-selectable="true">
                                @foreach($benefits as $benefit)
                                    <option value="{{ $benefit->id }}">{{ $benefit->title }} (ID: {{ $benefit->id }})</option>
                                @endforeach
                            </select>
                            @if ($errors->has('benefits'))
                                <p class="help-block help-block-error">{{ $errors->first('benefits')  }}</p>
                            @endif
                        </div>

                        <div class="form-group cases_cover">
                            <label for="cases_cover">UseCases cover image (Optional)</label>
                            <input id="cases_cover" type="file" name="cases_cover" class="form-control" data-preview-file-type="text">
                            @if ($errors->has('cases_cover'))
                                <p class="help-block help-block-error">{{ $errors->first('cases_cover') }}</p>
                            @endif
                        </div>

                        <div class="form-group use_cases form-material">
                            <label for="use_cases" class="form-control-label">Use Cases (Required)</label>
                            <select name="use_cases[]" id="use_cases"
                                    multiple="multiple"
                                    class="form-control"
                                    data-selectable="true">
                                @foreach($useCases as $useCase)
                                    <option value="{{ $useCase->id }}">{{ $useCase->title }} (ID: {{ $useCase->id }})</option>
                                @endforeach
                            </select>
                            @if ($errors->has('use_cases'))
                                <p class="help-block help-block-error">{{ $errors->first('use_cases') }}</p>
                            @endif
                        </div>

                        <div class="form-group form-material features required">
                            <label class="form-control-label" for="features">Features (Required)</label>
                            <select name="features[]" id="features"
                                    multiple="multiple"
                                    class="form-control"
                                    data-selectable="true">
                                @foreach($features as $feature)
                                    <option value="{{ $feature->id }}">{{ $feature->title }} (ID: {{ $feature->id }})</option>
                                @endforeach
                            </select>
                            @if ($errors->has('features'))
                                <p class="help-block help-block-error">{{ $errors->first('features')  }}</p>
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
                            <button type="submit" class="btn btn-success btn-round">Create !</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection

@push('scripts')
    <script src="{{ asset('assets/remark/js/posts.js') }}"></script>
    <script src="{{ asset('assets/remark/global/vendor/fileinput/js/plugins/piexif.min.js') }}"></script>
    <script src="{{ asset('assets/remark/global/vendor/fileinput/js/plugins/sortable.min.js') }}"></script>
    <script src="{{ asset('assets/remark/global/vendor/fileinput/js/fileinput.min.js') }}"></script>
    <script src="{{ asset('assets/remark/global/vendor/fileinput/themes/fa/theme.min.js') }}"></script>

    <script>
        $('input[type=file]').fileinput({
            theme: 'fa',
            showUpload: false,
            allowedFileType: ['image'],
            allowedFileExtensions: ['jpg','jpeg','png', 'gif', 'svg'],
            previewFileType: 'image',
            dropZoneEnabled: true,
            showRemove: false,
            autoOrientImage: false,
            showBrowse: false,
            browseOnZoneClick: true,
            actionDelete: '',
            dropZoneTitle: 'Click or drag image here for uploading.',
            dropZoneClickTitle: '',
            showCaption: false,
        });

        $(document).on('click', 'button.add-feature', function (e) {
            e.preventDefault();
            let container;

            locales.forEach(function (locale) {
                container = $('.features-container-' + locale);
                let index = container.find('fieldset').length;
                container.append(`
                  <fieldset data-index="${index}">
                    <p>Feature:</p>
                    <input name="additional_features[${locale}][]" class="form-control">
                    <button class="btn btn-xs btn-round btn-danger float-right delete-feature">Delete</button>
                  </fieldset>
                `);
            });
        });

        $(document).on('click', 'button.delete-feature', function (e) {
            e.preventDefault();
            let fieldset = $(this).parent('fieldset');
            let container;

            locales.forEach(function (locale) {
                container = $('.features-container-' + locale);
                container.find('fieldset[data-index="'+ fieldset.attr('data-index') +'"]').remove();
            });
        })
    </script>
@endpush