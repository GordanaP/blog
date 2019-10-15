<div class="p-3 my-2 border">

    <p class="mt-0 font-semibold">{{ $comment->user->name }}</p>

    <p class="text-xs text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>

    <p class="mt-3">{{ $comment->body }}</p>

</div>