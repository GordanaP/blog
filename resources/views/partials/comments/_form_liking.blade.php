<form action="{{ route('users.comments.likings.store', [$user, $comment]) }}"
method="POST" class="form-inline">

    @csrf

    @buttonLike
        bg-green-300 hover:bg-green-400
    @endbuttonLike

    @buttonDislike
        bg-red-300 hover:bg-red-400
    @endbuttonDislike
</form>