<?php

namespace App\Http\Controllers\User;

use App\User;
use App\Article;
use App\Http\Controllers\Controller;
use App\Http\Requests\Validation\ArticleLikeRequest;

class UserArticleLikeController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Validation\ArticleLikeRequest  $request
     * @param  \App\User  $user
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleLikeRequest $request, User $user, Article $article)
    {
        $article->getLikeOrDislikeFrom($user);

        return back();
    }

}
