<span class="mr-2">{{  $comment->likes_count() }}</span>

@noAuthLiking($comment)
    @include('partials.comments._form_liking', [
        'user' => $user,
        'comment' => $comment
    ])
@endnoAuthLiking

@guestOrAuthLiking($comment)
    @buttonLike
        {{ $comment->isLikedBy($user) ? 'bg-green-400' : 'bg-green-300' }}
    @endbuttonLike

    @buttonDislike
        {{ $comment->isDislikedBy($user) ? 'bg-red-400' : 'bg-red-300' }}
    @endbuttonDislike
@endguestOrAuthLiking

<span class="ml-2">
    {{  $comment->dislikes_count() }}
</span>