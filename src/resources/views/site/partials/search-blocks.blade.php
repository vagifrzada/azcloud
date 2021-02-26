@foreach($data as $item)
    <div class="search-result">
        <p class="label">{{ trans('main.type_' . $item['type']) ?? '' }}</p>
        <a class="value" href="{{ searchRoute($item) }}" target="_blank">{{ $item['title'] }}</a>
    </div>
@endforeach