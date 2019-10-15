<?php

namespace App\Providers;

use App\Utilities\DateFormatter;
use Illuminate\Support\ServiceProvider;
use App\Utilities\ArticleApprovalStatus;

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

        $this->app->bind('ArticleApprovalStatus', function($app){
            return new ArticleApprovalStatus;
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
