<?php

namespace App\ViewComposers;

use Illuminate\View\View;
use App\Services\Filter\Article\ArticleFiltersMap;

class ArticleFiltersMapComposer
{
    public function compose(View $view)
    {
        $view->with([
            'filters' => ArticleFiltersMap::filters(),
        ]);
    }
}