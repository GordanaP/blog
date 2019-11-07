<form action="{{ $route }}" method="POST">

    @csrf

    @if (request()->route('user'))
        @method('PATCH')
    @endif

    <p class="text-sm mb-3 text-gray-600 font-serif">* Required fields</p>

    <!-- Roles -->
    <div class="form-group">
        <label for="role" class="mr-3"> Role:</label>
        @foreach ($roles as $role)
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox"
                    name="role_id[]" id="role_{{ $role->id }}"
                    value="{{ $role->id }}"
                    @if ($ids = old('role_id', isset($user) ? $user->roles->pluck('id') : null)))
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

        @formError(['field' => 'role_id'])@endformError
    </div>

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

        <input type="text" class="form-control mt-2 hidden"
        id="password" name="password" placeholder="********">

        @formError(['field' => 'password'])@endformError
        @formError(['field' => 'generate_password'])@endformError
    </div>

    <div class="form-group">
        <button class="btn btn-primary">
            {{ $button_title }}
        </button>
    </div>
</form>

@section('scripts')
    <script>

        var radio = 'radio'
        var passwordInput = $('#password');
        var passwordError = $('p.password');
        var checkedValue = 'manually_generate';

        toggleHiddenElementByCheckedInput(radio, checkedValue, passwordInput, passwordError)

    </script>
@endsection