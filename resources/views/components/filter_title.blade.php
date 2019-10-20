<h4 class="flex justify-between">

    {{ ucfirst($filter) }}

    @if (QueryManager::detects($filter))
        <small>
            <a href="{{ route($routeName, isset($user) ? [$user] + QueryManager::remove($filter) : QueryManager::remove($filter)) }}" class="text-sm text-gray-700">
                &times; Remove filter
            </a>
        </small>
    @endif

</h4>
