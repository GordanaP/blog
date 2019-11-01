<div class="p-3 my-2 border">
    <div class="flex justify-between">
        <div>
            <p class="mt-0 font-semibold">{{ $comment->user->name }}</p>

            <p class="text-xs text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
        </div>

        <div>
            @include('partials.likeables._model', [
                'user' => $user,
                'model' => $comment,
                'route' => route('users.comments.likes.store', [$user, $comment]),
            ])
        </div>
    </div>

    <p class="mt-3">{{ $comment->body }}</p>
</div>
