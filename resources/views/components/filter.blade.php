<li class="{{ QueryManager::makeActiveClass($key, $filter)}}">
    <a  href="{{ $route }}"
        class=" text-grey-darker">
        {{ ucwords($value) }}
    </a>
</li>
