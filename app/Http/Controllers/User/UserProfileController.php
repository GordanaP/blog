<?php

namespace App\Http\Controllers\User;

use App\User;
use App\Profile;
use App\Http\Controllers\Controller;
use App\Http\Requests\Validation\ProfileRequest;

class UserProfileController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->authorizeResource(Profile::class);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        $this->authorize('view', $user);

        return view('profiles.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Validation\ProfileRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function store(ProfileRequest $request, User $user)
    {
        $this->authorize('view', $user);

        $profile = $user->addProfile($request->validated());

        return redirect()->route('profiles.show', $profile);
    }

    /**
     * Authorize the controller methods.
     *
     * @return array
     */
    protected function resourceAbilityMap()
    {
         return [
            'create' => 'create',
            'store' => 'create',
        ];
    }
}
