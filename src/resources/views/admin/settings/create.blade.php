@extends('layouts.admin')

@section('content')

<form id="settings-create" method="POST" action="{{ route('admin.settings.store') }}">
    @csrf
    <div class="row">
        <div class="col-lg-8">
            <div class="panel">
                <div class="panel-body">
                    <h3>Creating setting</h3>
                    <br>
                    <div class="form-group form-material key required">
                        <label class="form-control-label" for="key">Key</label>
                        <input type="text" id="key" class="form-control" name="key" aria-required="true" value="{{ old('key') }}">
                        @if ($errors->has('key'))
                            <p class="help-block help-block-error">{{ $errors->first('key') }}</p>
                        @endif
                    </div>

                    <div class="form-group form-material value required">
                        <label class="form-control-label" for="value">Value</label>
                        <input type="text" id="value" class="form-control" name="value" aria-required="true" value="{{ old('value') }}">
                        @if ($errors->has('value'))
                            <p class="help-block help-block-error">{{ $errors->first('value') }}</p>
                        @endif
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-round">Create !</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection
