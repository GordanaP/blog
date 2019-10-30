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
