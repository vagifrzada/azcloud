@extends('layouts.admin')

@section('header_actions')
    <a class="btn btn-danger btn-round" href="{{ route('admin.products.index') }}">Cancel</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-6 centered">
            <div class="panel">
                <form action="{{ route('admin.products.create') }}" method="GET">
                    <div class="panel-body">
                        <h3 class="text-center">1. Select category for product</h3>
                        <br>

                        <div class="form-group form-material category">
                            <select name="category" id="category" class="form-control">
                                <option disabled selected> - Select category - </option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->getId() }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('category'))
                                <p class="help-block help-block-error">{{ $errors->first('category') }}</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-round float-right">Next step</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection