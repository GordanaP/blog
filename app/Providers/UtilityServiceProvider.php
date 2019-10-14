<?php

namespace App\Providers;

use App\Utilities\ArticleStatus;
use App\Utilities\DateFormatter;
use Illuminate\Support\ServiceProvider;

class UtilityServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('DateFormatter', function($app){
            return new DateFormatter;
        });

        $this->app->bind('ArticleStatus', function($app){
            return new ArticleStatus;
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
