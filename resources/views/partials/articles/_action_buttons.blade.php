<a href="{{ route('articles.edit', $article) }}"
class="btn btn-sm btn-warning">
    <i class="fa fa-pencil fa-sm"></i>
</a>

@include('partials.articles._form_delete', [
    'article' => $article
])

<button class="btn btn-sm
@if ($article->isWaitingPublishing() || $article->isPublished())
    btn-success
@elseif($article->isWaitingApproval())
    btn-outline-success
@else($article->missedPublishing())
    btn-dark
@endif
">
    @if ($article->isWaitingPublishing())
        <i class="fa fa-sm fa-calendar aria-hidden="true></i>
    @elseif($article->isWaitingApproval())
        <i class="fa fa-hourglass-half" aria-hidden="true"></i>
    @elseif($article->missedPublishing())
        <i class="fa fa-sm fa-flag" aria-hidden="true"></i>
    @else
        <i class="fa fa-newspaper-o" aria-hidden="true"></i>
    @endif
</button>
