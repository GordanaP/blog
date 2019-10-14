<a href="{{ route('articles.edit', $article) }}"
class="btn btn-sm btn-warning">
    <i class="fa fa-pencil fa-sm"></i>
</a>

@include('partials.articles._form_delete', [
    'article' => $article
])