<div class="blog-post">

    <div class="mb-3">
        <div class="mb-2">
            @include('partials.articles._action_buttons', [
                'article' => $article
            ])
        </div>

        @if (! $article->isPublished() || $article->missedPublishing())
            <p class="text-gray-600 text-xs">
                Publishing Date:
                <span class="font-semibold">
                    {{ optional($article->publish_at)->format('d M Y') }}
                </span>
            </p>
        @endif
    </div>

    <h3 class="mt-0">
        <a href="{{ route('articles.show', $article) }}">
            {{ $article->title }}
        </a>
    </h3>

    <p class="blog-post-meta mt-1 mb-3">
        {{ $article->created_at_readable }}
        by <a href="#">
            {{ $article->user->name }}
        </a>
    </p>

    <p class="text-sm italic">{{ $article->excerpt }}</p>

    <hr>

    <div>{{ $article->body }}</div>

</div><!-- /.blog-post -->