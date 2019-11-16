<?php

namespace App\Http\Controllers\Article;

use App\Article;
use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;

class ArticleAjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        return response([
            'data' => ArticleResource::collection(Article::all())
        ]);
    }
}
