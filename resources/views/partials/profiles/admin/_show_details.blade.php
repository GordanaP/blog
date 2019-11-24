<table class="table mb-0">
    <tbody class="bg-white border">
        @rowInfo(['name' => 'ID'])
            {{ $profile->id }}
        @endrowInfo

        @rowInfo(['name' => 'First name'])
            {{ $profile->first_name }}
        @endrowInfo

        @rowInfo(['name' => 'Last name'])
            {{ $profile->last_name }}
        @endrowInfo

        @rowInfo(['name' => 'Biography'])
            <a class="btn btn-outline-primary btn-sm" data-toggle="collapse"
                href="#profileBiography" aria-expanded="false"
                aria-controls="profileBiography">
                View
            </a>

            <div class="collapse w-4/5" id="profileBiography">
                {{ $profile->biography }}
            </div>
        @endrowInfo

        @rowInfo(['name' => 'Avatar'])
            @if ($profile->hasAvatar())
                <div class="w-1/2">
                    <img src="{{ ProfileImageService::getUrl($profile->avatar) }}"
                    alt="{{ $profile->full_name }}" class="img-thumbnail">
                </div>
            @else
                n/a
            @endif
        @endrowInfo

        @rowInfo(['name' => 'Created'])
            {{ $profile->created_at }}
        @endrowInfo

        @rowInfo(['name' => 'Last update'])
            {{ $profile->updated_at }}
        @endrowInfo

        @rowInfo(['name' => 'Account'])
            <a href="{{ route('admin.users.show', $profile->user) }}">
                {{ $profile->user->email }}
            </a>
        @endrowInfo

    </tbody>
</table>