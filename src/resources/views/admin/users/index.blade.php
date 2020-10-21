@extends('layouts.admin')

@section('content')
    <div class="users-index">
        <div class="box">
            <div class="box-header with-border">
                <p><a class="btn btn-success" href="{{ route('admin.users.create') }}">Create user</a></p>
            </div>
            <div class="box-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts() }}
@endpush
