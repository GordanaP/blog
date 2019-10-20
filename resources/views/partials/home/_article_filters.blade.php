@if ($filters = Arr::only($filters, 'status'))
    @foreach ($filters as $filter => $query)
        <ul class="list-unstyled mb-0">
            @foreach ($query as $key => $value)
                @filter([
                    'filter' => $filter,
                    'key' => $key,
                    'value' => $value,
                    'route' => route('users.articles.index', [Auth::user()] + QueryManager::build([$filter => $key])),
                ])
                @endfilter
            @endforeach
        </ul>
    @endforeach
@endif
