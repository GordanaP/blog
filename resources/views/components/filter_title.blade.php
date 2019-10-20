<h4 class="flex justify-between">

    {{ ucfirst($filter) }}

    @if (QueryManager::detects($filter))
        <small>
            <a href="{{ request()->route('user') ? route( 'users.articles.index', [request()->route('user')] + QueryManager::remove($filter)) : route('articles.index', QueryManager::remove($filter)) }}" class="text-sm text-gray-700">
                &times; Remove filter
            </a>
        </small>
    @endif

</h4>