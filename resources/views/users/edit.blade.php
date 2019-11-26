@notAdmin
    @include('partials.users.auth._layout_edit', [
        'user' => $user
    ])
@endnotAdmin

@admin
    @include('partials.users.admin._layout_edit', [
        'user' => $user
    ])
@endadmin