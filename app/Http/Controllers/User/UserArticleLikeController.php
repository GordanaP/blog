<?php

namespace App\Http\Controllers\User;

use App\User;
use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Validation\ArticleLikeRequest;

class UserArticleLikeController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleLikeRequest $request, User $user, Article $article)
    {
        $article->getLikeOrDislikeFrom($user);

        return back();
    }
}
