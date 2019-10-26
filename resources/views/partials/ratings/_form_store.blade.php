@if (! $article->isRatedBy($user))
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
        <span class="normal-case text-sm font-semibold text-yellow-700 mr-2">
            Your rating: {{ $article->ratingGivenBy(Auth::user()) }}
        </span>
        @rating(['article' => $article, 'user' => $user])
        @endrating
    </div>
@endif
