@author(Auth::user())
    @include('partials.profiles.user._create')
@endauthor

@admin
    @include('partials.profiles.admin._create')
@endadmin