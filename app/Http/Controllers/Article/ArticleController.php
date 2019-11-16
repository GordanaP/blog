<?php

namespace App\Http\Controllers\Article;

use App\Article;
use Illuminate\Http\Request;
use App\Facades\ArticleService;
use App\Http\Controllers\Controller;
use App\Services\Image\ArticleImageService;
use App\Http\Requests\Validation\ArticleRequest;
use App\Services\Filter\Article\ArticleFilterService;

class ArticleController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
        $this->authorizeResource(Article::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Services\Filter\Article\ArticleFilterService $articleFilterService
     * @return \Illuminate\Http\Response
     */
    public function index(ArticleFilterService $articleFilterService)
    {
        $articles = Article::filter($articleFilterService)
            ->published()
            ->newest()
            ->paginate(5);

        return view('articles.index')->with([
            'articles' => $articles,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Validation\UserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        ArticleService::create($request->validated());

        return redirect()->route('articles.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Validation\ArticleRequest  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, Article $article)
    {
        ArticleService::update($request->validated());

        return redirect()->route('articles.show', $article);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Article $article = null)
    {
        // $article ? $this->authorize('delete', $article)
        //     : $this->authorize('viewAny', Article::class);

        ArticleService::remove();

        return response([
            'message' => 'The article has been deleted'
        ]);
    }

    /**
     * Authorize the controller methods.
     *
     * @return array
     */
    protected function resourceAbilityMap()
    {
         return [
            'edit' => 'update',
            'update' => 'update',
        ];
    }
}
