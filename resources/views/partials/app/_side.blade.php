<!-- About widget -->
<div class="sidebar-module sidebar-module-inset">
    <h4>About</h4>
    <p>
        Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.
    </p>
</div>

<!-- Filters widget -->
@if (QueryManager::detectsAny($filters))
    <a href="{{ isset($user) ? route('users.articles.index', $user) : route('articles.index') }}"
    class="text-sm text-gray-700 uppercase font-semibold">
        &times; Remove all filters
    </a>
@endif

@if ($filters = isset($user) ? Arr::except($filters, 'user') : Arr::except($filters, 'status'))
    @foreach ($filters as $filter => $query)
        @include('partials.articles._filters', [
            'categoriesQuery' => $filters['category']->split(2),
            'filter' => $filter,
            'query' => $query,
            'routeName' => isset($user) ? 'users.articles.index' : 'articles.index',
        ])
    @endforeach
@endif
