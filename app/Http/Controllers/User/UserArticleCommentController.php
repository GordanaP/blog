<?php

namespace App\Http\Controllers\User;

use App\User;
use App\Article;
use Illuminate\Http\Request;
use App\Mail\CommentWasPosted;
use App\Facades\ArticleService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
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
     * @param  \App\Http\Requests\Validation\CommentRequest  $request
     * @param  \App\User  $user
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request, User $user, Article $article)
    {
        $this->authorize('view', $user);
        $this->authorize('view', $article);

        $comment = ArticleService::addComment($request->validated());

        ArticleService::notifyAuthorOnANewComment($comment);

        return back();
    }
}
