<?php

use Illuminate\Http\Request;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

/**
 * User
 */
Route::get('users', 'Api\ApiUserController@index')
    ->name('api.users.index');

