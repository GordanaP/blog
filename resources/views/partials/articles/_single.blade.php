<div class="blog-post">

    <div class="mb-2">
        <a href="{{ route('articles.edit', $article) }}"
        class="btn btn-sm btn-warning">
            <i class="fa fa-pencil fa-sm"></i>
        </a>

        @include('partials.articles._form_delete', [
            'article' => $article
        ])
    </div>

    <h3 class="mt-0">
        <a href="{{ route('articles.show', $article) }}">
            {{ $article->title }}
        </a>
    </h3>

    <p class="blog-post-meta mt-1 mb-3">
        {{ $article->created_at->diffForHumans() }}
        by <a href="#">
            {{ $article->user->name }}
        </a>
    </p>

    <p class="text-sm italic">{{ $article->excerpt }}</p>

    <hr>

    <div>{{ $article->body }}</div>

</div><!-- /.blog-post -->