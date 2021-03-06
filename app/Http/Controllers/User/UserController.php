<?php

namespace App\Http\Controllers\User;

use App\User;
use App\Facades\UserService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Validation\UserRequest;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
        // $this->authorizeResource(User::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users_count = User::count();

        return view('users.index', compact('users_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Validation\UserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = UserService::create($request->filter());

        return redirect()->route('admin.users.show', $user);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Validation\UserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        UserService::update($request->filter());

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserRequest $request, User $user = null)
    {
        // $user ? $this->authorize('delete', $user)
        //     : $this->authorize('viewAny', User::class);

        UserService::delete();

        if (request()->ajax()) {
            return response(['message' => 'The record has been deleted']);
        } else {
            return redirect()->route('users.articles.index', Auth::user());
        }
    }

    /**
     * Authorize the controller methods.
     *
     * @return array
     */
    // protected function resourceAbilityMap()
    // {
    //      return [
    //         'index' => 'viewAny',
    //         'create' => 'create',
    //         'store' => 'create',
    //         'edit' => 'update',
    //         'update' => 'update',
    //     ];
    // }
}
