<h4 class="flex justify-between mb-1">
    {{ ucfirst($filter) }}

    @if (QueryManager::detects($filter))
        <small>
            <a href="{{ ArticleFiltersUrlManager::removeQuery('users.articles.index', 'articles.index', $filter) }}" class="text-sm text-gray-700">
                &times; Remove filter
            </a>
        </small>
    @endif
</h4>
