<?php

namespace App\Http\Controllers\Category;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;

class CategoryAjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response([
            'data' => CategoryResource::collection(Category::all())
        ]);
    }
}
