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
            'archive' => [
                'this_month' => 'This month',
                'last_month' => 'Last month',
                'older' => 'Older'
            ],
            'sort' => [
                'asc' => 'oldest',
                'desc' => 'latest'
            ],
            'category' =>  Category::all()->pluck('name', 'name'),
            'tag' =>  Tag::all()->pluck('name', 'name'),
            'user' =>  User::find([1,2])->pluck('name', 'id'),
        ];
    }
}
