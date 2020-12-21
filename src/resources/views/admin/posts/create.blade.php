@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-lg-8">
            <div class="panel">
                <div class="panel-body">

                    <ul class="nav nav-tabs">
                        @foreach (LaravelLocalization::getSupportedLocales() as $locale => $info)
                            <li class="nav-item">
                                <a class="nav-link {{ $locale == config('app.locale') ? 'active' : null }}" href="#{{$locale}}" data-toggle="tab">
                                    {{ $info['name'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>

                    <div class="tab-content mt-4">
                        @foreach (LaravelLocalization::getSupportedLocales() as $locale => $info)
                        <div class="tab-pane {{ $locale == config('app.locale') ? 'active' : null }}" id="{{ $locale }}">

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-12">

                                            <div class="form-group form-material title required">
                                                <label class="form-control-label" for="title">Title</label>
                                                <input type="text" id="title" class="form-control" name="title[{{ $locale }}]" aria-required="true" value="{{ old('title') }}">
                                                @if ($errors->has('title'))
                                                    <p class="help-block help-block-error">{{ $errors->first('title') }}</p>
                                                @endif
                                            </div>

                                            <div class="form-group form-material slug required">
                                                <label class="form-control-label" for="slug">Slug</label>
                                                <input type="text" id="slug" class="form-control" name="slug[{{ $locale }}]" aria-required="true" value="{{ old('slug') }}">
                                                @if ($errors->has('slug'))
                                                    <p class="help-block help-block-error">{{ $errors->first('slug') }}</p>
                                                @endif
                                            </div>

                                            <div class="form-group form-material content">
                                                <label class="form-control-label" for="content">Content</label>
                                                <textarea name="content[{{ $locale  }}]" id="content" cols="30" rows="10" class="form-control">
                                                    {!! old('content') !!}
                                                </textarea>
                                                @if ($errors->has('content'))
                                                    <p class="help-block help-block-error">{{ $errors->first('content') }}</p>
                                                @endif
                                            </div>

                                        </div>
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

                </div>
            </div>

            <div class="form-group float-right">
            </div>
        </div>
    </div>

@endsection