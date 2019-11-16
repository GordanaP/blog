<?php

namespace App\Http\Controllers\User;

use App\User;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;

class UserAjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke()
    {
        return response([
            'data' => UserResource::collection(User::all())
        ]);
    }
}
