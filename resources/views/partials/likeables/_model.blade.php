<span class="mr-2">{{  $model->likes_count() }}</span>

@notLiked($model)
    @include('partials.likeables._form_store', [
        'route' => $route
    ])
@endnotLiked

@liked($model)
    @buttonLike
        {{ $model->isLikedBy($user) ? 'bg-green-400' : 'bg-green-200' }}
    @endbuttonLike

    @buttonDislike
        {{ $model->isDislikedBy($user) ? 'bg-red-400' : 'bg-red-200' }}
    @endbuttonDislike
@endliked

<span class="ml-2">
    {{ $model->dislikes_count() }}
</span>