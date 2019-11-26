<?php

namespace App\Providers;

use App\ViewComposers\TagsComposer;
use App\ViewComposers\RolesComposer;
use Illuminate\Support\Facades\View;
use App\ViewComposers\AuthorsComposer;
use App\ViewComposers\ProfilesComposer;
use Illuminate\Support\ServiceProvider;
use App\ViewComposers\CategoriesComposer;
use App\ViewComposers\Article\FiltersComposer;
use App\ViewComposers\Article\StatisticsComposer;
use App\ViewComposers\Article\ApprovalStatusComposer;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        View::composer('partials.articles._form_save', CategoriesComposer::class);
        View::composer('partials.articles._form_save', TagsComposer::class);
        View::composer('partials.articles._form_save', ApprovalStatusComposer::class);
        View::composer('partials.articles._form_save', AuthorsComposer::class);
        View::composer('partials.profiles._form_save', ProfilesComposer::class);
        View::composer(
            ['partials.app._side', 'partials.home._article_filters'],
            FiltersComposer::class);
        View::composer('partials.app._side', StatisticsComposer::class);
        View::composer('partials.users._form_save', RolesComposer::class);
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
