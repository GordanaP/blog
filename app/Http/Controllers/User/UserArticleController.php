<?php

namespace App\Http\Controllers\User;

use App\User;
use App\Article;
use App\Facades\ArticleService;
use App\Events\ArticlePublished;
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

        $user_articles = Article::filter($articleFilterService)
            ->ownedBy($user)
            ->newest()
            ->paginate(5);

        return view('articles.index')->with([
            'articles' => $user_articles,
            'user' => $user
        ]);
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

        $article = ArticleService::create($request->validated());

        if($article->is_published) {
            event(new ArticlePublished($article));
        }

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
