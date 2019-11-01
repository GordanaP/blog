<span class="mr-1">{{  $model->approved_count > 0 ? $model->approved_count : '' }}</span>

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
    {{  $model->disapproved_count > 0 ? $model->disapproved_count : ''  }}
</span>