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
        <ul class="list-unstyled mb-0">
            @foreach ($map as $key => $value)
                <li class="{{ QueryManager::makeActiveClass($key, $filter)}}">
                    <a  href="{{ route($routeName, QueryManager::build([$filter => $key])) }}"
                        class=" text-grey-darker">
                        {{ ucwords($value) }}
                    </a>
                </li>
            @endforeach
        </ul>
    @else
        <div class="row">
            @foreach ($categories as $chunks)
                <div class="col-lg-6">
                    <ul class="list-unstyled mb-0">
                        @foreach ($chunks as $key => $value)
                            <li class="{{ QueryManager::makeActiveClass($key, $filter) }}">
                                <a href="{{ route($routeName, QueryManager::build([$filter => $key])) }}">
                                    {{ ucwords($value) }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    @endif
</div>
