<form action="{{ $route }}" method="POST" {{ $type ?? null }}>

    @csrf

    @if (Request::route($model))
        @method('PATCH')
    @endif

    <p class="text-sm mb-3 text-gray-600 font-serif">* Required fields</p>

    {{ $slot }}

    <div class="form-group">
        @submit(['model' => $model])
        @endsubmit
    </div>

</form>