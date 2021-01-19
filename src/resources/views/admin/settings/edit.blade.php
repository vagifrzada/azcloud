@extends('layouts.admin')

@section('content')

<form id="settings-create" method="POST" action="{{ route('admin.settings.update', ['setting' => $setting->getId()]) }}">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-lg-8">
            <div class="panel">
                <div class="panel-body">
                    <h3>Updating setting: [{{ $setting->getKey() }}]</h3>
                    <br>
                    <div class="form-group form-material key required">
                        <label class="form-control-label" for="key">Key</label>
                        <input type="text" id="key" readonly disabled class="form-control" name="key" aria-required="true" value="{{ $setting->getKey() }}">
                        @if ($errors->has('key'))
                            <p class="help-block help-block-error">{{ $errors->first('key') }}</p>
                        @endif
                    </div>

                    <div class="form-group form-material value required">
                        <label class="form-control-label" for="value">Value</label>
                        <input type="text" id="value" class="form-control" name="value" aria-required="true" value="{{ $setting->getValue() }}">
                        @if ($errors->has('value'))
                            <p class="help-block help-block-error">{{ $errors->first('value') }}</p>
                        @endif
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-round">Update !</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection
