<?php

namespace App\ViewComposers;

use Arr;
use Illuminate\View\View;
use App\Services\Filter\Article\ArticleFiltersMap;
use App\Services\Filter\Article\UserArticleFiltersMap;

class ArticleFiltersMapComposer
{
    public function compose(View $view)
    {
        $view->with([
            'filters' => ArticleFiltersMap::filters(),
        ]);
    }
}