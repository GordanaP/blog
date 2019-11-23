<form action="{{ $route }}" method="POST">

    @csrf

    @if (request()->route('tag'))
        @method('PATCH')
    @endif

    <p class="text-sm mb-3 text-gray-600 font-serif">* Required fields</p>

    <!-- Name -->
    <div class="form-group">
        <label for="name">Name: @asterisks @endasterisks</label>
        <input type="text" name="name" id="name" class="form-control"
        placeholder="Enter name" value="{{ $tag->name ?? old('name') }}">

        @formError(['field' => 'name'])@endformError
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-outline-success bg-teal-400
            hover:bg-teal-500 text-white">
            {{ $button_title }}
        </button>
    </div>

</form>