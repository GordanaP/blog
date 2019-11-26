@form(['model' => 'role', 'route' => $route])
    <div class="form-group">
        <label for="name">Name: @asterisks @endasterisks</label>
        <input type="text" name="name" id="name" class="form-control"
        placeholder="Enter name" value="{{ old('name', $role->name ?? null) }}">

        @formError(['field' => 'name'])@endformError
    </div>
@endform