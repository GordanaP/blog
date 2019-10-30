<?php

namespace App\ViewComposers\Article;

use Illuminate\View\View;
use App\Utilities\ArticleStatistics;

class StatisticsComposer
{
    public function compose(View $view)
    {
        $view->with([
            'best_rated' => ArticleStatistics::bestRated(),
            'most_commented' => ArticleStatistics::mostCommented(),
        ]);
    }
}