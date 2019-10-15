<p class="text-xs text-gray-600 ">
    Status:
    <span class=" font-semibold tracking-wide
        @if ($article->is_waiting_publishing || $article->is_published)
            text-green-400
        @elseif($article->is_pending || $article->is_draft)
            text-orange-400
        @else
            text-red-400
        @endif
    ">

        @if ($article->is_waiting_publishing)
            Approved for publishing
        @elseif($article->is_pending)
            Pending
        @elseif($article->is_expired)
            Expired
        @elseif($article->is_draft)
            Draft
        @else
            Published
        @endif
    </span>
</p>

@if ($article->is_unpublished)
    <p class="text-gray-600 text-xs">
        Publishing Date:
        <span class="font-semibold">
            {{ optional($article->publish_at)->format('d M Y') ?? 'n/a' }}
        </span>
    </p>
@endif