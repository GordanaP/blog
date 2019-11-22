<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use App\Role;

class RoleUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Role $role)
    {
        $role_users_count = $role->users->count();

        return view('users.index', compact('role', 'role_users_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param \App\Role $role
     * @return \Illuminate\Http\Response
     */
    public function create(Role $role)
    {
        return view('users.create', compact('role'));
    }
}
