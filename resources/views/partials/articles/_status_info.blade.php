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