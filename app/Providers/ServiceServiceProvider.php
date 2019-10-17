<?php

namespace App\Providers;

use App\Services\Images\ImageService;
use Illuminate\Support\ServiceProvider;
use App\Services\Images\ArticleImageService;
use App\Services\Images\ProfileImageService;

class ServiceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('ArticleImageService', function($app){
            return new ArticleImageService;
        });

        $this->app->bind('ProfileImageService', function($app){
            return new ProfileImageService;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
