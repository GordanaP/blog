<?php

namespace App\Utilities;

use App\Article;

class ArticleStatistics
{
    public static function mostCommented($take = 3)
    {
        return Article::orderBy('comments_count', 'desc')
            ->take($take)
            ->get();
    }

    public static function bestRated($take = 3)
    {
        return Article::with('ratings')
            ->get()
            ->sortByDesc('average_rating')
            ->take($take);
    }
}
