@extends('layouts.admin')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/remark/global/vendor/fileinput/css/fileinput.min.css') }}">
@endpush

@section('content')

    <form id="menu-update" method="POST" action="{{ route('admin.menu-item.update', ['menu_item' => $menu->getId()]) }}" enctype="multipart/form-data">
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
                            <?php $trans = $menu->translate($locale); ?>
                        <div class="tab-pane {{ $locale == config('app.locale') ? 'active' : null }}" id="{{ $locale }}">
                            <div class="row">
                                <div class="col-lg-12">

                                    <div class="form-group form-material title required">
                                        <label class="form-control-label" for="title-{{ $locale }}">Title</label>
                                        <input type="text" id="title-{{ $locale }}" class="form-control" name="title[{{ $locale }}]" aria-required="true" value="{{ $trans->title ?? old('title.' . $locale) }}">
                                        @if ($errors->has('title.' . $locale))
                                            <p class="help-block help-block-error">{{ $errors->first('title.' . $locale) }}</p>
                                        @endif
                                    </div>

                                    <div class="form-group form-material subtitle required">
                                        <label class="form-control-label" for="subtitle-{{ $locale }}">Subtitle</label>
                                        <input type="text" id="subtitle-{{ $locale }}" class="form-control" name="subtitle[{{ $locale }}]" aria-required="true" value="{{ $trans->subtitle ?? old('subtitle.' . $locale) }}">
                                        @if ($errors->has('subtitle.' . $locale))
                                            <p class="help-block help-block-error">{{ $errors->first('subtitle.' . $locale) }}</p>
                                        @endif
                                    </div>

                                    <div class="form-group form-material description required">
                                        <label class="form-control-label" for="description-{{ $locale }}">Description</label>
                                        <input type="text" id="description-{{ $locale }}" class="form-control" name="description[{{ $locale }}]" aria-required="true" value="{{ $trans->description ?? old('description.' . $locale) }}">
                                        @if ($errors->has('description.' . $locale))
                                            <p class="help-block help-block-error">{{ $errors->first('description.' . $locale) }}</p>
                                        @endif
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

                    <div class="form-group form-material url required">
                        <label class="form-control-label" for="url">Url for menu item</label>
                        <input type="text" class="form-control" name="url" value="{{ $menu->getUrl() ?? old('url') }}" placeholder="Example: /services or https://google.com">
                        @if ($errors->has('url'))
                            <p class="help-block help-block-error">{{ $errors->first('url')  }}</p>
                        @endif
                    </div>

                    <div class="form-group cover">
                        <label for="image">Image</label>
                        <input id="image" type="file" name="image" class="form-control" data-preview-file-type="text">
                        @if ($errors->has('image'))
                            <p class="help-block help-block-error">{{ $errors->first('image') }}</p>
                        @endif
                    </div>

                    <div class="form-group form-material status required">
                        <label class="form-control-label" for="status">Status</label>
                        <input type="hidden" name="status"  value="0">
                        <input id="status" type="checkbox" @if ($menu->isActive()) checked @endif data-plugin="switchery" name="status" value="{{ old('status', 1)  }}">
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
    <script src="{{ asset('assets/remark/global/vendor/fileinput/js/plugins/piexif.min.js') }}"></script>
    <script src="{{ asset('assets/remark/global/vendor/fileinput/js/plugins/sortable.min.js') }}"></script>
    <script src="{{ asset('assets/remark/global/vendor/fileinput/js/fileinput.min.js') }}"></script>
    <script src="{{ asset('assets/remark/global/vendor/fileinput/themes/fa/theme.min.js') }}"></script>

    <script>
        let imageUrl = '{{ optional($menu->getCover())->getUrl() }}';
        let config = {
            uploadAsync: false,
            overwriteInitial: true,
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
        };

        if (imageUrl !== '') {
            config. initialPreview = [imageUrl];
            config.initialPreviewAsData = true;
            config.initialPreviewConfig = [
                {
                    caption: imageUrl,
                    downloadUrl: imageUrl,
                    width: '120px',
                }
            ];
        }


        $('#image').fileinput(config);
    </script>
@endpush