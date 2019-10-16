<div class="mb-2">
    <strong class="d-inline-block mb-2 text-primary uppercase text-sm tracking-wider">
        {{ $article->category->name }}
    </strong>
    <p class="mb-0 text-base font-semibold">
        <a class="text-dark" href="{{ route('articles.show', $article) }}">
            {{ $article->title }}
        </a>
    </p>
    <div class="mb-1 text-muted text-sm">
        {{ $article->publish_at->format('d M Y') }}
    </div>
    <p class="card-text mb-auto text-sm text-gray-700">
        {{ $article->excerpt }}
    </p>
</div>

<hr>
