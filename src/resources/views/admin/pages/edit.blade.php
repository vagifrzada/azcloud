@extends('layouts.admin')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/remark/global/vendor/fileinput/css/fileinput.min.css') }}">
@endpush

@section('content')

    <form id="page-update" method="POST" action="{{ route('admin.pages.update', ['page' => $page->getId()]) }}" enctype="multipart/form-data">
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
                        <li class="nav-item">
                            <a class="nav-link" href="#gallery" data-toggle="tab">Gallery</a>
                        </li>
                    </ul>

                    <div class="tab-content mt-4">
                        @foreach ($supportedLocales as $locale => $info)
                        <div class="tab-pane {{ $locale == config('app.locale') ? 'active' : null }}" id="{{ $locale }}">
                            @php $translation = $page->translate($locale); @endphp
                            <div class="row">
                                <div class="col-lg-12">

                                    <div class="form-group form-material title required">
                                        <label class="form-control-label" for="title-{{ $locale }}">Title</label>
                                        <input type="text" id="title-{{ $locale }}" class="form-control" name="title[{{ $locale }}]" aria-required="true" value="{{ $translation->title  }}">
                                        @if ($errors->has('title.' . $locale))
                                            <p class="help-block help-block-error">{{ $errors->first('title.' . $locale) }}</p>
                                        @endif
                                    </div>

                                    <div class="form-group form-material description">
                                        <label class="form-control-label" for="description-{{ $locale }}">Description</label>
                                        <textarea rows="10" name="description[{{ $locale  }}]" id="description-{{ $locale }}" class="form-control"> {!! $translation->description !!}</textarea>
                                        @if ($errors->has('description.' . $locale))
                                            <p class="help-block help-block-error">{{ $errors->first('description.' . $locale) }}</p>
                                        @endif
                                    </div>

                                    <div class="form-group form-material content">
                                        <label class="form-control-label" for="content-{{ $locale }}">Content</label>
                                        <textarea name="content[{{ $locale  }}]" id="content-{{ $locale }}" class="form-control">
                                            {!! $translation->content !!}
                                        </textarea>
                                        @if ($errors->has('content.' . $locale))
                                            <p class="help-block help-block-error">{{ $errors->first('content.' . $locale) }}</p>
                                        @endif
                                    </div>

                                    <hr>
                                    <br>

                                    <div class="form-group form-material meta">
                                        <fieldset>
                                            <legend>Meta tags</legend>
                                            <br>
                                            <label class="form-control-label" for="meta-title-{{ $locale }}">Meta title</label>
                                            <input type="text" name="meta[{{ $locale }}][title]" id="meta-title-{{ $locale }}" class="form-control" value="{{ $translation->getMeta('title') }}">
                                            <br>
                                            <label class="form-control-label" for="meta-keywords-{{ $locale }}">Meta keywords</label>
                                            <input type="text" name="meta[{{ $locale  }}][keywords]" id="meta-keywords-{{ $locale }}" class="form-control" value="{{ $translation->getMeta('keywords') }}">
                                            <br>
                                            <label class="form-control-label" for="meta-description-{{ $locale }}">Meta description</label>
                                            <textarea name="meta[{{ $locale }}][description]" id="meta-description-{{ $locale }}" class="form-control">{{ $translation->getMeta('description') }}</textarea>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach

                        <div class="tab-pane" id="gallery">
                            <div class="row">
                                <div class="col-lg-12">
                                    <input id="images" type="file" name="images[]" class="form-control" multiple data-preview-file-type="text">
                                </div>
                            </div>
                        </div>
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
                    <div class="form-group form-material parent_id required">
                        <label class="form-control-label" for="parent_id">Parent page</label>
                        <select name="parent_id" id="parent_id" class="form-control">
                            <option value="0">Default</option>
                            @foreach($pages as $pageItem)
                                <option @if ($page->getParent() == $pageItem->getId()) selected @endif value="{{ $pageItem->getId() }}">{{ $pageItem->getTitle() }}</option>
                                @if (filled($children = $pageItem->children))
                                    @include('admin.pages._children', ['children' => $children, 'dash' => 2, 'page' => $page])
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group image">
                        <label for="identity">Identity</label>
                        <input id="identity" type="text" disabled class="form-control" value="{{ $page->getIdentity() }}">
                    </div>

                    <div class="form-group form-material status required">
                        <label class="form-control-label" for="status">Status</label>
                        <input type="hidden" name="status"  value="0">
                        <input id="status" type="checkbox" data-plugin="switchery" name="status" value="1" @if($page->isActive()) checked @endif>
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
    <script src="{{ asset('assets/remark/js/pages.js') }}"></script>
    <script src="{{ asset('assets/remark/global/vendor/fileinput/js/plugins/piexif.min.js') }}"></script>
    <script src="{{ asset('assets/remark/global/vendor/fileinput/js/plugins/sortable.min.js') }}"></script>
    <script src="{{ asset('assets/remark/global/vendor/fileinput/js/fileinput.min.js') }}"></script>
    <script src="{{ asset('assets/remark/global/vendor/fileinput/themes/fa/theme.min.js') }}"></script>

    <script>
        let gallery = @json($gallery);

        let initialPreviews = [];
        let initialPreviewsConfig = [];
        for (let mediaIndex in gallery) {
            if (!gallery.hasOwnProperty(mediaIndex)) continue;
            initialPreviews.push(gallery[mediaIndex]);
            initialPreviewsConfig.push({
                key: mediaIndex,
                caption: gallery[mediaIndex],
                downloadUrl: gallery[mediaIndex],
                width: '120px',
            })
        }

        $('#images').fileinput({
            initialPreview: initialPreviews,
            initialPreviewAsData: true,
            initialPreviewConfig: initialPreviewsConfig,
            overwriteInitial: false,
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
            deleteUrl: '{{ route('admin.media.delete') }}',
            dropZoneTitle: 'Click or drag image here for uploading.',
            dropZoneClickTitle: '',
            showCaption: false,
        });
    </script>
@endpush