 <ol class="dd-list">
     @foreach($children as $child)
        <li class="dd-item dd3-item" data-id="{{ $child['id'] }}">
            <div class="dd-handle dd3-handle"></div>
            <div class="dd3-content">{{ $child['title'] }} ({{ $child['identity'] }})
                <button class="btn btn-danger btn-round btn-xs float-right delete-record">
                    <i class="md-delete"></i>
                </button>
                <a href="{{ route('admin.pages.edit', $child['id']) }}" class="btn btn-info btn-round btn-xs float-right">
                    <i class="md-edit"></i>
                </a>
            </div>
            @if (isset($child['children']) && filled($child['children']))
                @include('admin.pages._nestable_children', ['children' => $child['children']])
            @endif
        </li>
     @endforeach
 </ol>
