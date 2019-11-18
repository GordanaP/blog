<?php

namespace App\Http\Controllers\User;

use App\User;
use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;

class UserArticleAjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        return response([
            'data' => ArticleResource::collection($user->articles)
        ]);
    }
}
