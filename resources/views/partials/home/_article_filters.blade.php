@if ($filters = Arr::only($filters, 'status'))
    @foreach ($filters as $filter => $query)
        <ul class="list-unstyled mb-0">
            @foreach ($query as $key => $value)
                @filter([
                    'filter' => $filter,
                    'key' => $key,
                    'value' => $value,
                    'route' => ArticleFiltersUrlManager::addQueryToRouteWithParameter('users.articles.index', [$filter => $key], Auth::user())
                ])
                @endfilter
            @endforeach
        </ul>
    @endforeach
@endif
