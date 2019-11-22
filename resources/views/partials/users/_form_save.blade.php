<form action="{{ $route }}" method="POST" id="saveUser">

    @csrf

    @if (request()->route('user'))
        @method('PATCH')
    @endif

    <p class="text-sm mb-3 text-gray-600 font-serif">* Required fields</p>

    <!-- Roles -->
    @admin
        <div class="form-group">
            <label for="role" class="mr-3"> Role:</label>
            @if ($role = request()->route('role'))
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox"
                        name="role_id[]" id="role_{{ $role->id }}"
                        value="{{ $role->id }}" checked >
                    <label class="form-check-label">
                        {{ $role->name }}
                    </label>
                </div>
            @else
                @foreach ($roles as $role)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox"
                            name="role_id[]" id="role_{{ $role->id }}"
                            value="{{ $role->id }}"
                            @if ($ids = old('role_id', isset($user) ? $user->roles->pluck('id') : null))
                                @foreach ($ids as $role_id)
                                    {{ getChecked($role->id, $role_id) }}
                                @endforeach
                            @endif
                        >
                        <label class="form-check-label">
                            {{ $role->name }}
                        </label>
                    </div>
                @endforeach
            @endif

            @formError(['field' => 'role_id'])@endformError
        </div>
    @endadmin

    <!-- Username -->
    <div class="form-group">
        <label for="name">Username: @asterisks @endasterisks</label>
        <input type="text" name="name" id="name" class="form-control"
        placeholder="Enter username" value="{{ $user->name ?? old('name') }}">

        @formError(['field' => 'name'])@endformError
    </div>

    <!-- Email -->
    <div class="form-group">
        <label for="email">Email: @asterisks @endasterisks</label>
        <input type="text" name="email" id="email" class="form-control"
        placeholder="example@domain.com" value="{{ $user->email ?? old('email') }}">

        @formError(['field' => 'email'])@endformError
    </div>

    <!-- Password -->
    <div class="form-group">
        <label for="password" class="mr-3"> Password:
            @if (! request()->route('user'))
                @asterisks @endasterisks
            @endif
        </label>

        @admin
        @if (request()->route('user'))
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="generate_password"
                    id="doNotChangePassword" value="do_not_change" checked>
                <label class="form-check-label" for="autoPassword">
                    Do not change
                </label>
            </div>
        @endif

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="generate_password"
                id="autoPassword" value="auto_generate"
                {{ ! request()->route('user') ? 'checked' : '' }}
            >
            <label class="form-check-label" for="autoPassword">
                Auto generate
            </label>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="generate_password"
                id="manualPassword" value="manually_generate">
            <label class="form-check-label" for="manualPassword">
                Generate manually
            </label>
        </div>
        @endadmin

        <input type="password" class="form-control mt-2 @admin hidden @endadmin"
        id="password" name="password" placeholder="********">

        @formError(['field' => 'password'])@endformError
        @admin
            @formError(['field' => 'generate_password'])@endformError
        @endadmin

        <!-- Password confirm -->
        @notAdmin
        <div class="form-group mt-3">
            <label for="password-confirm">Confirm password:</label>

            <input type="password" name="password_confirmation" id="password-confirm"
                class="form-control" placeholder="Retype password">
        </div>
        @endnotAdmin
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-outline-success bg-teal-400
            hover:bg-teal-500 text-white">
            {{ $button_title }}
        </button>
    </div>
</form>


@section('scripts')
    @admin
    <script>
        var form = $('#saveUser');
        var radioOption = $('#manualPassword');
        var hiddenInput = $('#password');
        var hiddenError = $('p.password');

        toggleHiddenElement(radioName(form), optionValue(radioOption), hiddenInput, hiddenError)

    </script>
    @endadmin
@endsection