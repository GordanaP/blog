<form action="{{ route('profiles.destroy', $profile) }}"
    method="POST" class="form-inline">

    @csrf
    @method('DELETE')

    <button class="btn btn-sm btn-danger">
        <i class="fa fa-sm fa-trash" aria-hidden="true"></i>
    </button>
</form>