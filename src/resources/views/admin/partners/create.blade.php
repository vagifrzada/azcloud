@extends('layouts.admin')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/remark/global/vendor/fileinput/css/fileinput.min.css') }}">
@endpush

@section('content')

    <form id="partners" method="POST" action="{{ route('admin.partners.store') }}" enctype="multipart/form-data">
        @csrf
      <div class="row">
        <div class="col-lg-8">
            <div class="panel">
                <div class="panel-body">
                    <div class="form-group title">
                        <label for="title">Title (Optional)</label>
                        <input id="title" type="text" name="title" class="form-control" value="{{ old('title')  }}">
                        @if ($errors->has('title'))
                            <p class="help-block help-block-error">{{ $errors->first('title') }}</p>
                        @endif
                    </div>

                    <div class="form-group link">
                        <label for="link">Link to partner (Optional)</label>
                        <input id="link" type="text" name="link" class="form-control" value="{{ old('link')  }}">
                        @if ($errors->has('link'))
                            <p class="help-block help-block-error">{{ $errors->first('link') }}</p>
                        @endif
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
    </script>
@endpush