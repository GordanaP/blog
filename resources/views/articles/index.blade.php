@guest
    @include('partials.articles.layouts.user._index')
@endguest

@notAdmin
    @include('partials.articles.layouts.user._index')
@endnotAdmin

@admin
    @include('partials.articles.layouts.admin._index')
@endadmin