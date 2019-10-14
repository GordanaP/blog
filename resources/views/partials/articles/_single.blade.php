<div class="blog-post">

    <div class="mb-3">
        <div class="mb-2">
            @include('partials.articles._action_buttons', [
                'article' => $article
            ])
        </div>

        <p class="text-xs text-gray-600 ">
            Status:
            <span class=" font-semibold tracking-wide
                @if ($article->isWaitingPublishing())
                    text-green-400
                @elseif($article->isWaitingApproval())
                    text-orange-400
                @elseif($article->missedPublishing())
                    text-red-400
                @else
                    text-green-400
                @endif
            ">
                @if ($article->isWaitingPublishing())
                    Approved
                @elseif($article->isWaitingApproval())
                    Pending
                @elseif($article->missedPublishing())
                    Expired
                @else
                    Published
                @endif
            </span>
        </p>

        @if (! $article->isPublished() || $article->missedPublishing())
            <p class="text-gray-600 text-xs">
                Publishing Date:
                <span class="font-semibold">
                    {{ optional($article->publish_at)->format('d M Y') ?? 'n/a' }}
                </span>
            </p>
        @endif
    </div>

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

    <div>{{ $article->body }}</div>

</div><!-- /.blog-post -->