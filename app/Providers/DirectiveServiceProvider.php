<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class DirectiveServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('notAdmin', function () {
            return Auth::check() && ! Auth::user()->is_admin;
        });

        Blade::if('author', function ($user) {
            return optional($user)->is_author;
        });

        Blade::if('hasProfile', function ($user) {
            return $user->hasProfile();
        });

        Blade::if('admin', function () {
            return Auth::check() && Auth::user()->is_admin;
        });

        Blade::if('noAuthLiking', function ($comment) {
            return Auth::check() && ! $comment->isLikedOrDislikedBy(Auth::user());
        });

        Blade::if('guestOrAuthLiking', function ($comment) {
            return Auth::guest() || $comment->isLikedOrDislikedBy(Auth::user());
        });
    }
}
