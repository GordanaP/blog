<form action="{{ $route }}"
method="POST" class="form-inline">

    @csrf

    @buttonLike
        bg-green-300 hover:bg-green-400
    @endbuttonLike

    @buttonDislike
        bg-red-300 hover:bg-red-400
    @endbuttonDislike

    @formError(['field' => 'is_liked'])
    @endformError
</form>