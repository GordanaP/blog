<form action="{{ $route }}" method="POST" class="form-inline">
    @csrf
    @method('DELETE')

    <button type="submit"
    class="btn btn-outline-danger bg-red-400 hover:bg-red-500 text-white">
        <i class="fa fa-trash" aria-hidden="true"></i>
    </button>
</form>