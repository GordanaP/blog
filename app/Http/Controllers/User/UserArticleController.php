<?php

namespace App\Http\Controllers\User;

use App\User;
use App\Article;
use App\Facades\ArticleImageService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Validation\ArticleRequest;

class UserArticleController extends Controller
{
    /**
     * Create a new controller instance
     */
    public function __construct()
    {
        $this->authorizeResource(Article::class);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        $this->authorize('view', $user);

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
        $this->authorize('view', $user);

        $article = $user->createArticle($request->validated());

        ArticleImageService::manage($article, $request->image);

        return redirect()->route('articles.show', $article);
    }

    /**
     * Authorize the controller methods.
     *
     * @return array
     */
    protected function resourceAbilityMap()
    {
         return [
            'create' => 'create',
            'store' => 'create',
        ];
    }
}
