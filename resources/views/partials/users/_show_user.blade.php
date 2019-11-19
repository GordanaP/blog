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
                {{ $role->name }}
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

            @rowInfo(['name' => 'Articles'])
                <a href="{{ route('admin.users.articles.index', $user) }}">
                    View
                </a>
            @endrowInfo
        @endif
    </tbody>
</table>