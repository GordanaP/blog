<form action="{{ route('articles.destroy', $article) }}" method="POST"
class="form-inline">

    @csrf
    @method('DELETE')

    <button class="btn btn-sm btn-danger">
        <i class="fa fa-trash fa-sm"></i>
    </button>

</form>