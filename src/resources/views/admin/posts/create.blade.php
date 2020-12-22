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
                                                <label class="form-control-label" for="title-{{ $locale }}">Title</label>
                                                <input type="text" id="title-{{ $locale }}" class="form-control" name="title[{{ $locale }}]" aria-required="true" value="{{ old('title') }}">
                                                @if ($errors->has('title'))
                                                    <p class="help-block help-block-error">{{ $errors->first('title') }}</p>
                                                @endif
                                            </div>

                                            <div class="form-group form-material slug required">
                                                <label class="form-control-label" for="slug-{{ $locale }}">Slug</label>
                                                <input type="text" id="slug-{{ $locale }}" class="form-control" name="slug[{{ $locale }}]" aria-required="true" value="{{ old('slug') }}">
                                                @if ($errors->has('slug'))
                                                    <p class="help-block help-block-error">{{ $errors->first('slug') }}</p>
                                                @endif
                                            </div>

                                            <div class="form-group form-material content">
                                                <label class="form-control-label" for="content-{{ $locale }}">Content</label>
                                                <textarea name="content[{{ $locale  }}]" id="content-{{ $locale }}" class="form-control">
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

                        <div class="form-group form-material tags">
                            <label class="form-control-label" for="tags">Tags</label>
                            <select name="tags[]" id="tags" multiple="multiple" class="form-control" data-selectable="true"></select>
                            @if ($errors->has('tags'))
                                <p class="help-block help-block-error">{{ $errors->first('tags') }}</p>
                            @endif
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
                    <div class="form-group form-material status required">
                        <label class="form-control-label" for="status">Status</label>
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

@endsection