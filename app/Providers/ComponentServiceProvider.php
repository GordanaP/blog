<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class ComponentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::component('components.error', 'formError');
        Blade::component('components.asterisks', 'asterisks');
        Blade::component('components.comment', 'comment');
        Blade::component('components.filters', 'filters');
        Blade::component('components.filter', 'filter');
        Blade::component('components.filter_title', 'filterTitle');
        Blade::component('components.article_rating', 'rating');
    }
}
