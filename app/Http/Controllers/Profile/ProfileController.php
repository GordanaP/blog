<?php

namespace App\Http\Controllers\Profile;

use App\Profile;
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
        $this->authorizeResource(Profile::class);
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
        $profile->saveChanges($request->validated());

        return view('profiles.show', compact('profile'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        $profile->remove();

        return view('home');
    }

    /**
     * Authorize the controller methods.
     *
     * @return array
     */
    protected function resourceAbilityMap()
    {
         return [
            'edit' => 'update',
            'update' => 'update',
            'destroy' => 'delete',
        ];
    }
}
