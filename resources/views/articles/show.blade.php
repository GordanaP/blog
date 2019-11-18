@if (Request::is('admin/*'))
    @include('partials.articles.layouts.admin._show', [
        'article' => $article
    ])
@else
    @include('partials.articles.layouts.user._show', [
        'article' => $article
    ])
@endif