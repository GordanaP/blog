<div class="sidebar-module sidebar-module-inset">
    <h4>About</h4>
    <p>
        Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.
    </p>
</div>

<div class="sidebar-module">
    <h4>Archives</h4>
    <ol class="list-unstyled">
        <li><a href="#">March 2014</a></li>
        <li><a href="#">February 2014</a></li>
        <li><a href="#">January 2014</a></li>
        <li><a href="#">December 2013</a></li>
    </ol>
</div>

<!-- Filters -->
@if (QueryManager::detectsAny($filters))
    <a href="{{ route('articles.index') }}"
    class="text-sm text-gray-700 uppercase font-semibold">
        &times; Remove all filters
    </a>
@endif

@foreach ($filters as $filter => $map)
    @include('partials.articles._filters', [
        'categories' => $filters['category']->chunk($filters['category']->count()/2),
        'filter' => $filter,
        'map' => $map,
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
