<table class="table mb-0">
    <tbody class="bg-white border">
        @rowInfo(['name' => 'ID'])
            {{ $user->id }}
        @endrowInfo

        @rowInfo(['name' => 'Username'])
            {{ $user->name }}
        @endrowInfo

        @rowInfo(['name' => 'Email'])
            {{ $user->email }}
        @endrowInfo

        @rowInfo(['name' => 'Roles'])
            @forelse ($user->roles as $role)
                <a href="{{ route('admin.roles.show', $role) }}">
                    {{ $role->name }}
                </a>
            @empty
                member
            @endforelse
        @endrowInfo

        @rowInfo(['name' => 'Joined'])
            {{ $user->created_at }}
        @endrowInfo

        @rowInfo(['name' => 'Last update'])
            {{ $user->updated_at }}
        @endrowInfo

        @if ($user->is_author)
            @rowInfo(['name' => 'Profile'])
                <a href="#">
                    View
                </a>
            @endrowInfo
        @endif
    </tbody>
</table>