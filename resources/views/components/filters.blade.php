<ul class="list-unstyled mb-0">
    @foreach ($array as $key => $value)
        <li class="{{ QueryManager::makeActiveClass($key, $filter)}}">
            <a  href="{{ route($routeName, QueryManager::build([$filter => $key])) }}"
                class=" text-grey-darker">
                {{ ucwords($value) }}
            </a>
        </li>
    @endforeach
</ul>