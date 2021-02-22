@foreach($children as $child)
    <option @if ($product->getParent() == $child->getId()) selected @endif  value="{{ $child->getId() }}">{{ str_repeat('-', $dash)  }} {{ $child->getTitle() }}</option>
    @if (filled($children = $child->children))
        @include('admin.pages._children', ['children' => $children, 'dash' => ++$dash ?? 3, 'product' => $product])
    @endif
@endforeach