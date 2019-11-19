<div class="mb-2">
    @edit(['route' => route('articles.edit', $article)])
    @endedit

    @delete(['route' => route('articles.destroy', $article)])
    @enddelete
</div>
