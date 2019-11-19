<p class="text-xs text-gray-600 ">
    Status:
    <span class="font-semibold tracking-wide {{ $article->status_color }}">
        {{ $article->status }}
    </span>
</p>

@if ($article->is_unpublished)
    <p class="text-gray-600 text-xs">
        Publishing Date:
        <span class="font-semibold">
            {{ $article->publish_at_formatted }}
        </span>
    </p>
@endif