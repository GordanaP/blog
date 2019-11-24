<?php

namespace App\Http\Controllers\Profile;

use App\Profile;
use App\Facades\ProfileService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Validation\ProfileRequest;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

    public function index()
    {
        $profiles_count = Profile::count();

        return view('profiles.index', compact('profiles_count'));
    }

    public function create()
    {
        return view('profiles.create');
    }

    public function store(ProfileRequest $request)
    {
        ProfileService::create($request->validated());

        return redirect()->route('admin.profiles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        return view('profiles.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        return view('profiles.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Validation\ProfileRequest  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request, Profile $profile)
    {
        ProfileService::update($request->validated());

        return redirect()->route('admin.profiles.show', $profile);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        ProfileService::delete();

        if (request()->ajax()) {
            return response(['message' => 'The record has been deleted']);
        } else {
            return redirect()->route('admin.profiles.index');
        }
    }
}
