<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Image\ArticleImageService;
use App\Services\Image\ProfileImageService;
use App\Services\Filter\Article\ArticleFiltersUrlManager;

class ServiceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('ArticleFiltersUrlManager', function($app){
            return new ArticleFiltersUrlManager;
        });

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
