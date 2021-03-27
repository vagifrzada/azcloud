@extends('layouts.admin')

@section('content')

    <div class="site-index">
        <div class="row">
            <div class="col-md-12">
                <h1>Welcome to AzCloud's Admin Panel.</h1>
                <a href="{{ route('admin.clear-cache') }}"
                   class="btn btn-danger btn-round btn-xs" onclick="return confirm('Are you sure to clear cache of application ?')">
                    Clear cache
                </a>
            </div>
        </div>
    </div>

@endsection
