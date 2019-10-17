<?php

namespace App\Http\Controllers\User;

use App\User;
use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Validation\CommentRequest;

class UserArticleCommentController extends Controller
{
    /**
     * Create a new controller instance
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request, User $user, Article $article)
    {
        $this->authorize('view', $user);

        $user->addComment($request->validated(), $article);

        return back();
    }
}