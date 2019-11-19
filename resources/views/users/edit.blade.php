@notAdmin
    @include('partials.users.layouts.auth._edit', [
        'user' => $user
    ])
@endnotAdmin

@admin
    @include('partials.users.layouts.admin._edit', [
        'user' => $user
    ])
@endadmin