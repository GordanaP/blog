<div class="sidebar-module">
    <h4 class="flex justify-between">
        {{ ucfirst($filter) }}

        @if (QueryManager::detects($filter))
            <small>
                <a href="{{ route($routeName, QueryManager::remove($filter)) }}"
                class="text-sm text-gray-700">
                    &times; Remove filter
                </a>
            </small>
        @endif
    </h4>

    @if ($filter !== 'category')
        @filters(['array' => $queryStrings, 'filter' => $filter, 'routeName' => $routeName])
        @endfilters
    @else
        <div class="row">
            @foreach ($categories as $chunks)
                <div class="col-lg-6">
                    @filters(['array' => $chunks, 'filter' => $filter, 'routeName' => $routeName])
                    @endfilters
                </div>
            @endforeach
        </div>
    @endif
</div>
