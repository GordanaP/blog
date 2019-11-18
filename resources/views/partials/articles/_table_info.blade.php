<table class="table mb-0">
    <tbody class="bg-white border">
        @rowInfo(['name' => 'ID'])
            {{ $article->id }}
        @endrowInfo

        @rowInfo(['name' => 'Status'])
            <span class="{{ $article->status_color }}">
                {{ $article->status }}
            </span>
        @endrowInfo

        @rowInfo(['name' => 'Title'])
            {{ $article->title }}
        @endrowInfo

        @rowInfo(['name' => 'Author'])
            <a href="{{ route('admin.users.articles.index', $article->user) }}">
                {{ $article->user->profile->full_name }}
            </a>
        @endrowInfo

        @rowInfo(['name' => 'Category'])
            <a href="#">
                {{ $article->category->name }}
            </a>
        @endrowInfo

        @rowInfo(['name' => 'Excerpt'])
            {{ $article->excerpt }}
        @endrowInfo

        @rowInfo(['name' => 'Body'])
            {{ $article->body }}
        @endrowInfo

        @rowInfo(['name' => 'Tags'])
            @forelse ($article->tags as $tag)
                <a href="#">
                    {{ $tag->name }}
                </a>
            @empty
            @endforelse
        @endrowInfo

        @rowInfo(['name' => 'Image'])
            @if ($article->hasImage())
                <div class="w-1/2">
                    <img src="{{ ArticleImageService::getUrl($article->image) }}"
                    alt="{{ $article->title }}" class="img-thumbnail">
                </div>
            @else
                n/a
            @endif
        @endrowInfo

        @rowInfo(['name' => 'Created'])
            {{ $article->created_at }}
        @endrowInfo

        @rowInfo(['name' => 'Last update'])
            {{ $article->updated_at }}
        @endrowInfo

        @rowInfo(['name' => 'Approved for publishing'])
            {{ $article->is_approved ? 'yes' : 'no' }}
        @endrowInfo

        @rowInfo(['name' => 'Publishing date'])
            {{ $article->publish_at_formatted }}
        @endrowInfo
    </tbody>
</table>