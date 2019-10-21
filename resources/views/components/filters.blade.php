@foreach ($query as $key => $value)
    <ul class="list-unstyled mb-0">
        @filter([
            'filter' => $filter,
            'key' => $key,
            'value' => $value,
            'route' => ArticleFiltersUrlManager::addQuery(
                'users.articles.index', 'articles.index', [$filter=>$key]
            )
        ])
        @endfilter
    </ul>
@endforeach

