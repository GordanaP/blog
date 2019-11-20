<?php

namespace App\Providers;

use App\Services\User\UserService;
use Illuminate\Support\ServiceProvider;
use App\Services\Article\ArticleService;
use App\Services\Category\CategoryService;
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
        $this->app->bind('CategoryService', function($app){
            return new CategoryService;
        });

        $this->app->bind('UserService', function($app){
            return new UserService;
        });

        $this->app->bind('ArticleService', function($app){
            return new ArticleService;
        });

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
