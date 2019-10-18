<div class="sidebar-module sidebar-module-inset">
    <h4>About</h4>
    <p>
        Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.
    </p>
</div>

<!-- Remove All Filters Link-->
@if (QueryManager::detectsAny($filters))
    <a href="{{ route('articles.index') }}"
    class="text-sm text-gray-700 uppercase font-semibold">
        &times; Remove all filters
    </a>
@endif

<!-- Filters list -->
@foreach ($filters as $filter => $queryStrings)
    @include('partials.articles._filters', [
        'categories' => $filters['category']->split(2),
        'filter' => $filter,
        'queryStrings' => $queryStrings,
        'routeName' => 'articles.index',
    ])
@endforeach

<div class="sidebar-module">
    <h4>Elsewhere</h4>
    <ol class="list-unstyled">
        <li><a href="#">GitHub</a></li>
        <li><a href="#">Twitter</a></li>
        <li><a href="#">Facebook</a></li>
    </ol>
</div>
