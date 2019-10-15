<div class="blog-post">

    @can('update', $article)
    <div class="mb-3">
        @include('partials.articles._action_buttons', [
            'article' => $article
        ])

        @include('partials.articles._status_info', [
            'article' => $article
        ])
    </div>
    @endcan

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

    <div class="mb-2">{{ $article->body }}</div>

    <p>
        @foreach ($article->tags as $tag)
            <a href="#" class="btn btn-link btn-sm btn-success bg-green-400
            text-white hover:no-underline">
                {{ $tag->name }}
            </a>
         @endforeach
    </p>

</div><!-- /.blog-post -->