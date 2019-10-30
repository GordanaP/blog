<span class="mr-1">{{  $model->likes_count() }}</span>

@noAuthLiking($model)
    @include('partials.likeables._form_store', [
        'route' => $route,
    ])
@endnoAuthLiking

@guestOrAuthLiking($model)
    @buttonLike
        {{ $model->isLikedBy($user) ? 'bg-green-500' : 'bg-green-200' }}
    @endbuttonLike

    @buttonDislike
        {{ $model->isDislikedBy($user) ? 'bg-red-500' : 'bg-red-200' }}
    @endbuttonDislike
@endguestOrAuthLiking

<span class="ml-1">
    {{  $model->dislikes_count() }}
</span>