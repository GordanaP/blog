<button type="submit" class="btn btn-outline-success bg-teal-400
    hover:bg-teal-500 uppercase text-xs text-white font-semibold tracking-wider">
    {{ Request::route($model) ? 'Save changes' : 'Add ' . $model ?? null }}
</button>