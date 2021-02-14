@extends('layouts.admin')

@section('header_actions')
    <a class="btn btn-success btn-round" href="{{ route('admin.certificates.create') }}">Create certificate</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel">
                <div class="panel-body">
                    {!! $dataTable->table() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {!! $dataTable->scripts() !!}
@endpush
