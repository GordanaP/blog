<?php

namespace App\Providers;

use App\Article;
use App\Observers\ArticleObserver;
use Illuminate\Support\ServiceProvider;

class ObserverServiceProvider extends ServiceProvider
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
        Article::observe(ArticleObserver::class);
    }
}
