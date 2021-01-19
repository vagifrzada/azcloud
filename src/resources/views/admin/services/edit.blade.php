@extends('layouts.admin')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/remark/global/vendor/fileinput/css/fileinput.min.css') }}">
@endpush

@section('content')

    <form id="service-update" method="POST" action="{{ route('admin.services.update', ['service' => $service->getId()]) }}" enctype="multipart/form-data">
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
                        <div class="tab-pane {{ $locale == config('app.locale') ? 'active' : null }}" id="{{ $locale }}">
                            <div class="row">
                                <div class="col-lg-12">

                                    <div class="form-group form-material title required">
                                        <label class="form-control-label" for="title-{{ $locale }}">Title</label>
                                        <input type="text" id="title-{{ $locale }}" class="form-control" name="title[{{ $locale }}]" aria-required="true" value="{{ $service->translate($locale)->title }}">
                                        @if ($errors->has('title.' . $locale))
                                            <p class="help-block help-block-error">{{ $errors->first('title.' . $locale) }}</p>
                                        @endif
                                    </div>

                                    <div class="form-group form-material slug required">
                                        <label class="form-control-label" for="slug-{{ $locale }}">Slug</label>
                                        <input type="text" id="slug-{{ $locale }}" class="form-control" name="slug[{{ $locale }}]" aria-required="true" value="{{ $service->translate($locale)->slug }}">
                                        @if ($errors->has('slug.' . $locale))
                                            <p class="help-block help-block-error">{{ $errors->first('slug.' . $locale) }}</p>
                                        @endif
                                    </div>

                                    <div class="form-group form-material subtitle required">
                                        <label class="form-control-label" for="subtitle-{{ $locale }}">SubTitle</label>
                                        <input type="text" id="subtitle-{{ $locale }}" class="form-control" name="subtitle[{{ $locale }}]" aria-required="true" value="{{ $service->translate($locale)->subtitle }}">
                                        @if ($errors->has('subtitle.' . $locale))
                                            <p class="help-block help-block-error">{{ $errors->first('subtitle.' . $locale) }}</p>
                                        @endif
                                    </div>

                                    <div class="form-group form-material content">
                                        <label class="form-control-label" for="content-{{ $locale }}">Content</label>
                                        <textarea name="content[{{ $locale  }}]" id="content-{{ $locale }}" class="form-control">
                                           {!! $service->translate($locale)->content  !!}
                                        </textarea>
                                        @if ($errors->has('content.' . $locale))
                                            <p class="help-block help-block-error">{{ $errors->first('content.' . $locale) }}</p>
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

                    <div class="form-group image">
                        <label for="image">Main image</label>
                        <input id="image" type="file" name="image" class="form-control" data-preview-file-type="text">
                        @if ($errors->has('image'))
                            <p class="help-block help-block-error">{{ $errors->first('image') }}</p>
                        @endif
                    </div>

                    <div class="form-group form-material price">
                        <label class="form-control-label" for="price">Price</label>
                        <input type="number" step="0.01" min="1" class="form-control" value="{{ $service->getPrice() }}" name="price">
                        @if ($errors->has('price'))
                            <p class="help-block help-block-error">{{ $errors->first('price') }}</p>
                        @endif
                    </div>

                    <div class="form-group form-material status required">
                        <label class="form-control-label" for="status">Status</label>
                        <input type="hidden" name="status"  value="0">
                        <input id="status" type="checkbox" checked data-plugin="switchery" name="status" value="{{ $service->isActive() }}">
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
        let imageUrl = '{{ optional($service->getCover())->getUrl() }}';
        $('input[type=file]').fileinput({
            uploadAsync: false,
            initialPreview: [imageUrl],
            initialPreviewAsData: true,
            initialPreviewConfig: [
                {
                    caption: imageUrl,
                    downloadUrl: imageUrl,
                    width: '120px',
                }
            ],
            overwriteInitial: true,
            theme: 'fa',
            showUpload: false,
            allowedFileType: ['image'],
            allowedFileExtensions: ['jpg','jpeg','png', 'gif'],
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
    </script>
@endpush