<?php

namespace App\Services\Filter\Article;

use App\Article;
use Illuminate\Pipeline\Pipeline;
use App\Services\Filter\TagFilter;
use App\Services\Filter\SortFilter;
use App\Services\Filter\UserFilter;
use App\Services\Filter\StatusFilter;
use App\Services\Filter\ArchiveFilter;
use App\Services\Filter\PopularFilter;
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
                ->withCount([
                    'comments',
                    'likes as approved_likes_count' => function ($query) {
                        $query->where('is_liked', 1);
                    },
                    'likes as disapproved_likes_count' => function ($query) {
                        $query->where('is_liked', 0);
                    },
                ])
                ->with('user', 'category', 'tags', 'comments', 'image', 'ratings')
            )
            ->through([
                PopularFilter::class,
                StatusFilter::class,
                ArchiveFilter::class,
                SortFilter::class,
                CategoryFilter::class,
                TagFilter::class,
                UserFilter::class,
            ])
            ->thenReturn();
    }
}