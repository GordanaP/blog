<form action="{{ $route }}" method="POST" enctype="multipart/form-data">

    @csrf

    @if (request()->route('profile'))
        @method('PUT')
    @endif

    <p class="text-sm mb-3 text-gray-600 font-serif">* Required fields</p>

    <!-- User -->
    @admin
        <div class="form-group">
            <label for="user_id">Account: @asterisks @endasterisks</label>
            <select name="user_id" id="user_id" class="form-control">
                <option>Select the account</option>
                @foreach ($user_authors as $user)
                    <option value="{{ $user->id }}"
                        {{ getSelected($user->id, old('user_id', $profile->user_id ?? null)) }}
                    >
                        {{ $user->email }}
                    </option>
                @endforeach
            </select>

            @formError(['field' => 'user_id'])@endformError
        </div>
    @endadmin

    <!-- First Name -->
    <div class="form-group">
        <label for="first_name">First name: @asterisks @endasterisks</label>
        <input type="text" name="first_name" id="first_name" class="form-control"
        placeholder="First name" value="{{ old('first_name', $profile->first_name ?? null) }}">

        @formError(['field' => 'first_name'])@endformError
    </div>

    <!-- Last name -->
    <div class="form-group">
        <label for="last_name">Last name: @asterisks @endasterisks</label>
        <input type="text" name="last_name" id="last_name" class="form-control"
        placeholder="Last name" value="{{ old('last_name', $profile->last_name ?? null) }}">

        @formError(['field' => 'last_name'])@endformError
    </div>

    <!-- Biography -->
    <div class="form-group">
        <label for="biography">Biography:</label>
        <textarea name="biography" id="biography" class="form-control" rows="5"
        placeholder="Biography">{{ old('biography', $profile->biography ?? null) }}</textarea>

        @formError(['field' => 'biography'])@endformError
    </div>

    <!-- Avatar -->
    <div class="flex form-group mt-3">
        <div>
            <label for="avatar">Upload avatar:</label>
            <input type="file" name="avatar" id="avatar"
            class="form-control-file">

            @formError(['field' => 'avatar'])@endformError
        </div>

        @if (optional($profile ?? null)->hasAvatar())
            <div class="w-1/4">
                <img src="{{ ProfileImageService::getUrl($profile->avatar) }}"
                alt="Profile Avatar">
            </div>`
        @endif
    </div>

    <!-- Button -->
    <button type="submit" class="btn btn-outline-success bg-teal-400
        hover:bg-teal-500 uppercase text-white text-xs font-semibold tracking-wider">
        {{ $button_title }}
    </button>
</form>