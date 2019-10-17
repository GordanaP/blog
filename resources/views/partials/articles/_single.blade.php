<div class="blog-post">
    <p class="uppercase text-xs tracking-wider font-thin mb-1">
        {{ $article->category->name }}
    </p>

    <h3 class="mt-0">
        <a href="{{ route('articles.show', $article) }}">
            {{ $article->title }}
        </a>
    </h3>

    <p class="blog-post-meta mt-1 mb-3">
        {{ $article->publish_at_readable }}
        by <a href="#">
            {{ $article->user->name }}
        </a>
    </p>

    <p class="text-sm italic">{{ $article->excerpt }}</p>

    <hr>

    @if ($article->hasImage())
        <img src="{{ ArticleImageService::getUrl($article->image) }}" class="w-full mb-4"
        alt="Article Image">
    @endif

    <div class="mb-2">{{ $article->body }}</div>

    <p class="flex justify-between">
        <span>
            @foreach ($article->tags as $tag)
                <a href="#" class="btn btn-link btn-sm btn-success bg-green-400
                text-white hover:no-underline">
                    {{ $tag->name }}
                </a>
             @endforeach
        </span>

        @if (! request()->route('article'))
            <span>
                 <i class="fa fa-comments-o" aria-hidden="true"></i>
                {{ $article->comments->count() }}
            </span>
        @endif
    </p>

</div><!-- /.article -->