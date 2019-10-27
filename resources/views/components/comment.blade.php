<div class="p-3 my-2 border">
    <div class="flex justify-between">
        <div>
            <p class="mt-0 font-semibold">{{ $comment->user->name }}</p>

            <p class="text-xs text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
        </div>

        <div>
            <span class="mr-2">
                {{  $comment->likes_count() }}
            </span>

            @if(Auth::check() && ! $comment->isLikedOrDislikedBy($user))
                <form action="{{ route('users.comments.likings.store', [$user, $comment]) }}"
                method="POST" class="form-inline">

                    @csrf

                    <button type="submit" name="is_liked" id="is_liked_1" value="1"
                        class="btn bg-green-300 hover:bg-green-400">
                       <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                    </button>

                    <button type="submit" name="is_liked" id="is_liked_0" value="0"
                        class="btn bg-red-300 hover:bg-red-400">
                       <i class="fa fa-thumbs-down" aria-hidden="true"></i>
                    </button>
                </form>
            @endif

            @if($comment->isLikedOrDislikedBy($user) || Auth::guest())
                <button type="submit" name="is_liked" id="is_liked_1" value="1"
                    class="btn {{ $comment->isLikedBy($user) ? 'bg-green-400' : 'bg-green-300' }}">
                   <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                </button>

                <button type="submit" name="is_liked" id="is_liked_0" value="0"
                    class="btn  {{ $comment->isDislikedBy($user) ? 'bg-red-400' : 'bg-red-300' }}">
                   <i class="fa fa-thumbs-down" aria-hidden="true"></i>
                </button>
            @endif

            <span class="ml-2">
                {{  $comment->dislikes_count() }}
            </span>
        </div>
    </div>

    <p class="mt-3">{{ $comment->body }}</p>
</div>
