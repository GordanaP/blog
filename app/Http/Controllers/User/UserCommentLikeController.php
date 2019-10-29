<?php

namespace App\Http\Controllers\User;

use App\User;
use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Validation\CommentLikeRequest;

class UserCommentLikeController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Validation\CommentLikeRequest  $request
     * @param  \App\User  $user
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function store(CommentLikeRequest $request, User $user, Comment $comment)
    {
        $comment->getLikeOrDislikeFrom($user);

        return back();
    }
}
