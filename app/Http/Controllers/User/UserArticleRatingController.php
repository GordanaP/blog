<?php

namespace App\Http\Controllers\User;

use App\User;
use App\Article;
use App\Facades\ArticleService;
use App\Http\Requests\Validation\RatingRequest;
use App\Http\Controllers\Controller;

class UserArticleRatingController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Validation\RatingRequest  $request
     * @param  \App\User  $user
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function store(RatingRequest $request, User $user, Article $article)
    {
        // $user->rateArticle($article, $request->rating);
        ArticleService::addRating($request->rating);

        return back();
    }
}
