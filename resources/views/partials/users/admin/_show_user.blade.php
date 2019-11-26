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
                    {{ ucfirst($role->name) }}
                </a>
            @empty
                Member
            @endforelse
        @endrowInfo

        @author($user)
            @rowInfo(['name' => 'Profile'])
                @hasProfile($user)
                    <a href="{{ route('admin.profiles.show', $user->profile) }}">
                        {{ $user->profile->full_name }}
                    </a>
                @else
                    n/a
                @endhasProfile
            @endrowInfo
        @endauthor

        @rowInfo(['name' => 'Joined'])
            {{ $user->created_at }}
        @endrowInfo

        @rowInfo(['name' => 'Last update'])
            {{ $user->updated_at }}
        @endrowInfo

    </tbody>
</table>