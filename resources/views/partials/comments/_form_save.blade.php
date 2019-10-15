<div class="card card-body border-none bg-gray-200 mb-5">
    <h5 class="mb-4 font-semibold uppercase">
        Leave a Comment
    </h5>

    <form action="{{ route('users.articles.comments.store', [$user, $article]) }}"
    method="POST">

        @csrf

        <div class="form-group">
            <textarea name="body" id="body" rows="4" class="form-control"
            placeholder="500 characters maximum">{{ old('body') }}</textarea>

            @formError(['field' => 'body'])@endformError
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-danger pull-right">
                Submit
            </button>
        </div>

    </form>
</div>