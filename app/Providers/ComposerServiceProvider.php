<?php

namespace App\Providers;

use App\ViewComposers\TagsComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\ViewComposers\CategoriesComposer;
use App\ViewComposers\ArticleFiltersMapComposer;
use App\ViewComposers\ArticleApprovalStatusComposer;

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
        View::composer('partials.articles._form_save', ArticleApprovalStatusComposer::class);
        View::composer(['partials.app._side', 'partials.home._article_filters'], ArticleFiltersMapComposer::class);
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
