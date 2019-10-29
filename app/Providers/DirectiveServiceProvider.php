<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Request;
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
        Blade::if('notLiked', function ($comment) {
            return Auth::check() && ! $comment->isLikedOrDislikedBy(Auth::user());
        });

        Blade::if('liked', function ($comment) {
            return Auth::guest() || $comment->isLikedOrDislikedBy(Auth::user());
        });

        Blade::if('routeHas', function ($parameter) {
            return Request::route($parameter);
        });

        Blade::if('routeDoesntHave', function ($parameter) {
            return ! Request::route($parameter);
        });
    }
}
