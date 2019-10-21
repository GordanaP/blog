<?php

namespace App\Http\Controllers\User;

use App\User;
use App\Article;
use App\Http\Controllers\Controller;
use App\Http\Requests\Validation\ArticleRequest;
use App\Services\Filter\Article\ArticleFilterService;

class UserArticleController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->authorizeResource(Article::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \App\User $user
     * @param  \App\Services\Filter\Article\ArticleFilterService $articleFilterService
     * @return \Illuminate\Http\Response
     */
    public function index(User $user, ArticleFilterService $articleFilterService)
    {
        $this->authorize('view', $user);

        $articles = Article::filter($articleFilterService)
            ->where('user_id', $user->id)
            ->newest()
            ->paginate(5);

        return view('articles.index', compact('articles', 'user'));
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
     * @param  \App\Http\Requests\Validation\ArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request, User $user)
    {
        $this->authorize('view', $user);

        $article = $user->createArticle($request->validated());

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
