<!-- About widget -->
@include('partials.app.widgets._about')

<!-- Most commented widget-->
@include('partials.app.widgets._most_commented')

<!-- Best rated widget-->
@include('partials.app.widgets._best_rated')

<!-- Filters widget -->
@if (QueryManager::detectsAny($filters))
    <a href="{{ isset($user) ? route('users.articles.index', $user) : route('articles.index') }}"
    class="text-sm text-gray-700 uppercase font-semibold">
        &times; Remove all filters
    </a>
@endif

@if ($filters = isset($user) ? Arr::except($filters, 'user') : Arr::except($filters, 'status'))
    @foreach ($filters as $filter => $query)
        @include('partials.app.widgets._filters', [
            'categoriesQuery' => $filters['category']->split(2),
            'filter' => $filter,
            'query' => $query,
        ])
    @endforeach
@endif
