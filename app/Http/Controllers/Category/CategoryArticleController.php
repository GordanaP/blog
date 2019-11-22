<?php

namespace App\Http\Controllers\Category;

use App\Category;
use App\Http\Controllers\Controller;

class CategoryArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        return view('articles.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category)
    {
        return view('articles.create', compact('category'));
    }
}
