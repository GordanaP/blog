@if (Request::is('admin/*'))
    @include('partials.articles.layouts.admin._index')
@else
    @include('partials.articles.layouts.user._index')
@endif