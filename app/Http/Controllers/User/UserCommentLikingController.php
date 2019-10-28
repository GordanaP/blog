<?php

namespace App\Http\Controllers\User;

use App\User;
use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserCommentLikingController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user, Comment $comment)
    {
        $comment->getLikingBy($user);

        return back();
    }

}
