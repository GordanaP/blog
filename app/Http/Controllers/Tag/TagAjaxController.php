<?php

namespace App\Http\Controllers\Tag;

use App\Tag;
use App\Http\Resources\TagResource;
use App\Http\Controllers\Controller;

class TagAjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response([
            'data' => TagResource::collection(Tag::withCount('articles')->get())
        ]);
    }
}
