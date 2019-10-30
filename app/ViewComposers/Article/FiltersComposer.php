<?php

namespace App\ViewComposers\Article;

use Illuminate\View\View;
use App\Services\Filter\Article\ArticleFiltersMap;

class FiltersComposer
{
    public function compose(View $view)
    {
        $view->with([
            'filters' => ArticleFiltersMap::filters(),
        ]);
    }
}