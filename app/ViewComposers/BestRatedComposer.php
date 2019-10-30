<?php

namespace App\ViewComposers;

use Illuminate\View\View;
use App\Utilities\ArticleStatistics;

class BestRatedComposer
{
    public function compose(View $view)
    {
        $view->with([
            'best_rated' => ArticleStatistics::bestRated(),
        ]);
    }
}