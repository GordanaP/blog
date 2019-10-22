<?php

namespace App\Services\Filter\Article;

use App\Tag;
use App\User;
use App\Category;

class ArticleFiltersMap
{
    public static function filters()
    {
        return [
            'status' => [
                'published' => 'Published',
                'approved' => 'Approved for Publishing',
                'pending' => 'Pending',
                'expired' => 'Expired',
                'draft' => 'Draft'
            ],
            'archive' => [
                'this_month' => 'This month',
                'last_month' => 'Last month',
                'older' => 'Older'
            ],
            'sort' => [
                'latest' => 'latest first',
                'oldest' => 'oldest first'
            ],
            'category' =>  Category::orderBy('name', 'asc')
                ->get()
                ->pluck('name', 'name'),
            'tag' =>  Tag::orderBy('name', 'asc')
                ->get()
                ->pluck('name', 'id'),
            'user' =>  User::orderBy('name')
                ->whereIn('id', [1, 2])
                ->get()
                ->pluck('name', 'id')
        ];
    }
}
