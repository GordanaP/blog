<?php

namespace App\Services\Filter\Article;

use App\Article;
use Illuminate\Pipeline\Pipeline;
use App\Services\Filter\TagFilter;
use App\Services\Filter\SortFilter;
use App\Services\Filter\UserFilter;
use App\Services\Filter\CategoryFilter;

class ArticleFilterService
{
    /**
     * Apply the article filters.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply()
    {
        return app(Pipeline::class)
            ->send(Article::query()
                ->withCount('comments')
                ->with('user', 'tags', 'comments', 'image')
            )
            ->through([
                SortFilter::class,
                CategoryFilter::class,
                UserFilter::class,
                TagFilter::class,
            ])
            ->thenReturn();
    }
}