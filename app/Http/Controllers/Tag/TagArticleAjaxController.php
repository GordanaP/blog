<?php

namespace App\Http\Controllers\Tag;

use App\Tag;
use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;

class TagArticleAjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Tag $tag)
    {
        return response([
            'data' => ArticleResource::collection($tag->articles)
        ]);
    }
}
