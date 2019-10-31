<?php

namespace App\Scopes;

class MostLikedScope
{
    public static function apply($query)
    {
        return $query->orderBy('approved_likes_count', 'desc');
    }
}