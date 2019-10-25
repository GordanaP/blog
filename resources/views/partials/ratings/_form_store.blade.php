@if (! $article->wasRatedBy($user))
    <form action="{{ route('users.articles.ratings.store', [$user, $article]) }}"
    method="POST">

        @csrf

        <div class="form-group">
            @rating(['article' => $article, 'user' => $user])
            @endrating
        </div>
    </form>

    @formError(['field' => 'rating'])@endformError
@else
    <div>
        @rating(['article' => $article, 'user' => $user])
        @endrating
    </div>
@endif
