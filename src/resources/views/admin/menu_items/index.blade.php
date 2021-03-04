@extends('layouts.admin')

@section('header_actions')
    <a class="btn btn-success btn-round" href="{{ route('admin.menu-item.create') }}">Create menu item</a>
@endsection

@push ('styles')
    <link rel="stylesheet" href="{{ asset('assets/remark/global/vendor/nestable/nestable.css') }}">
@endpush

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-8">
                            {{-- Nestable begin--}}
                            @if (filled($menuItems))
                                <div class="dd" id="nestable3">
                                <ol class="dd-list">
                                    @foreach ($menuItems as $item)
                                        <li class="dd-item dd3-item" data-id="{{ $item['id'] }}">
                                            <div class="dd-handle dd3-handle"></div>
                                            <div class="dd3-content">
                                                {{ $item['title'] }}
                                                <button class="btn btn-danger btn-round btn-xs float-right delete-record">
                                                    <i class="md-delete"></i>
                                                </button>
                                                <a href="{{ route('admin.menu-item.edit', $item['id']) }}" class="btn btn-info btn-round btn-xs float-right">
                                                    <i class="md-edit"></i>
                                                </a>
                                            </div>
                                        </li>
                                    @endforeach
                                </ol>
                            </div>

                                <form action="" id="deleteRecord" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            @endif
                            {{-- Nestable end --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/remark/global/vendor/nestable/nestable2.js') }}"></script>
    <script>
        let updateOutput = function (e) {
            let list = e.length ? e : $(e.target), output = list.data('output');
            let url = '{{ route('admin.menu-item.update-nestable') }}';
            $.post(url, {list: list.nestable('serialize')}, function (response) {
                // console.log(response);
            });
        };
        $('.dd').nestable().on('change', updateOutput);
        $('button.delete-record').on('click', function (e) {
            e.preventDefault();
            let record = $(this).parents('li').attr('data-id');
            let targetForm = $('form#deleteRecord');
            targetForm.attr('action', '/admin/menu-item/' + record);
            if (confirm('Are you sure to delete this record ?')) {
                targetForm.submit();
                return false;
            }
        });
    </script>
@endpush
