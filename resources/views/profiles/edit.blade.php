@author(Auth::user())
    @include('partials.profiles.user._edit')
@endauthor

@admin
    @include('partials.profiles.admin._edit')
@endadmin