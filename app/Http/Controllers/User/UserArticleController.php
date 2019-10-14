<?php

namespace App\Http\Controllers\User;

use App\User;
use App\Article;
use App\Http\Controllers\Controller;
use App\Http\Requests\Validation\ArticleRequest;

class UserArticleController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        return view('articles.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\User  $user
     * @param  \App\Http\Request\Validation\ArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request, User $user)
    {
        $article = $user->createArticle($request->validated());

        return redirect()->route('articles.show', $article);
    }
}
