@foreach ($query as $key => $value)
    <ul class="list-unstyled mb-0">
        @filter([
            'filter' => $filter,
            'key' => $key,
            'value' => $value,
            'route' => request()->route('user')
                ? route(
                    'users.articles.index',
                    [request()->route('user')] + QueryManager::build([$filter => $key])
                )
                : route(
                    'articles.index',
                    QueryManager::build([$filter => $key])
                )
        ])
        @endfilter
    </ul>
@endforeach