@author(Auth::user())
    @include('partials.articles.layouts.user._create')
@endauthor

@admin
    @include('partials.articles.layouts.admin._create')
@endadmin