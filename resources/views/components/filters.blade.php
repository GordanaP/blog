@foreach ($query as $key => $value)
    <ul class="list-unstyled mb-0">
        @filter([
            'filter' => $filter,
            'key' => $key,
            'value' => $value,
            'route' => request()->fullUrlWithQuery(QueryManager::build([$filter => $key]))
        ])
        @endfilter
    </ul>
@endforeach