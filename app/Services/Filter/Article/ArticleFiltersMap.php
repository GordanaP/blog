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
            'sort' => [
                'asc' => 'ascedens',
                'desc' => 'descedens'
            ],
            'category' =>  Category::all()->pluck('name', 'name'),
            'tag' =>  Tag::all()->pluck('name', 'name'),
            'user' =>  User::findMany([1,2])->pluck('name', 'id'),
        ];
    }
}
