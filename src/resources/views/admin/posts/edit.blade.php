@extends('layouts.admin')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/remark/global/vendor/fileinput/css/fileinput.min.css') }}">
@endpush

@section('content')

    <form id="post-create" method="POST" action="{{ route('admin.posts.update', ['post' => $post->getId()]) }}" enctype="multipart/form-data">
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
                            @php $translation = $post->translate($locale); @endphp
                            <div class="row">
                                <div class="col-lg-12">

                                    <div class="form-group form-material title required">
                                        <label class="form-control-label" for="title-{{ $locale }}">Title</label>
                                        <input type="text" id="title-{{ $locale }}" class="form-control" name="title[{{ $locale }}]" aria-required="true" value="{{ $translation->title  }}">
                                        @if ($errors->has('title.' . $locale))
                                            <p class="help-block help-block-error">{{ $errors->first('title.' . $locale) }}</p>
                                        @endif
                                    </div>

                                    <div class="form-group form-material slug required">
                                        <label class="form-control-label" for="slug-{{ $locale }}">Slug</label>
                                        <input type="text" id="slug-{{ $locale }}" class="form-control" name="slug[{{ $locale }}]" aria-required="true" value="{{ $translation->slug }}">
                                        @if ($errors->has('slug.' . $locale))
                                            <p class="help-block help-block-error">{{ $errors->first('slug.' . $locale) }}</p>
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

                    <div class="form-group image">
                        <label for="image">Main image</label>
                        <input id="image" type="file" name="image" class="form-control" data-preview-file-type="text">
                        @if ($errors->has('image'))
                            <p class="help-block help-block-error">{{ $errors->first('image') }}</p>
                        @endif
                    </div>

                    <div class="form-group form-material tags">
                        <label class="form-control-label" for="tags">Tags</label>
                        <select id="tags"
                                name="tags[]"
                                multiple="multiple"
                                class="form-control"
                                data-selectable="true"
                                data-xhr-route="{{ route('admin.tags.list') }}"
                                data-tags="true"
                                data-inputlength="3"
                                data-placeholder="Select tags ..."
                        >
                            @foreach($post->tags as $tag)
                                <option selected value="{{ $tag->getName() }}">{{ $tag->getName() }}</option>
                            @endforeach

                        </select>
                        @if ($errors->has('tags'))
                            <p class="help-block help-block-error">{{ $errors->first('tags') }}</p>
                        @endif
                    </div>

                    <div class="form-group form-material status required">
                        <label class="form-control-label" for="status">Status</label>
                        <input type="hidden" name="status"  value="0">
                        <input id="status" type="checkbox" data-plugin="switchery" name="status" value="1" @if($post->isActive()) checked @endif>
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
    <script src="{{ asset('assets/remark/js/posts.js') }}"></script>
    <script src="{{ asset('assets/remark/global/vendor/fileinput/js/plugins/piexif.min.js') }}"></script>
    <script src="{{ asset('assets/remark/global/vendor/fileinput/js/plugins/sortable.min.js') }}"></script>
    <script src="{{ asset('assets/remark/global/vendor/fileinput/js/fileinput.min.js') }}"></script>
    <script src="{{ asset('assets/remark/global/vendor/fileinput/themes/fa/theme.min.js') }}"></script>

    <script>
        let imageUrl = '{{ optional($post->getCover())->getUrl() }}';
        $('#image').fileinput({
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
            allowedFileExtensions: ['jpg','jpeg','png', 'gif'],
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