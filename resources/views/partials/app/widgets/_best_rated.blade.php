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
