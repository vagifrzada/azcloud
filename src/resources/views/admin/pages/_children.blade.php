@foreach($children as $child)
    <option @if ($page->getParent() == $child->getId()) selected @endif  value="{{ $child->getId() }}">{{ str_repeat('-', $dash)  }} {{ $child->getTitle() }}</option>
    @if (filled($children = $child->children))
        @include('admin.pages._children', ['children' => $children, 'dash' => ++$dash ?? 3, 'page' => $page])
    @endif
@endforeach