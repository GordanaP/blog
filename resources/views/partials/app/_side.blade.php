<!-- About widget -->
<div class="sidebar-module sidebar-module-inset mb-4 lp-0">
    <h4>About</h4>
    <p>
        Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.
    </p>
</div>

<!-- Most commented widget-->
<div class="py-2">
    <h4>Most commented</h4>
    <p class="text-gray-600 text-sm">What people are talking about</p>
    <hr>

    <ul class="list-unstyled">
        @foreach ($most_commented as $article)
            <li class="mb-1">
                <a href="{{ route('articles.show', $article) }}">
                    <p>{{ $article->title }} ({{ $article->comments_count }})</p>
                </a>
            </li>
        @endforeach
    </ul>
</div>

<!-- Best rated widget-->
<div class="py-2">
    <h4>Best rated</h4>
    <p class="text-gray-600 text-sm">How people rate articles</p>
    <hr>

    <ul class="list-unstyled">
        @foreach ($best_rated as $article)
            <li class="mb-1">
                <a href="{{ route('articles.show', $article) }}">
                    <p>{{ $article->title }} ({{ $article->average_rating }})</p>
                </a>
            </li>
        @endforeach
    </ul>
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
        ])
    @endforeach
@endif
