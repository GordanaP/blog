<?php

namespace App\ViewComposers;

use Illuminate\View\View;
use App\Utilities\ArticleStatistics;

class MostCommentedComposer
{
    public function compose(View $view)
    {
        $view->with([
            'most_commented' => ArticleStatistics::mostCommented(),
        ]);
    }
}