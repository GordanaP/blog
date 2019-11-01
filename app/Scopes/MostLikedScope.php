<?php

namespace App\Scopes;

class MostLikedScope
{
    public static function apply($query)
    {
        return $query->orderBy('approved_count', 'desc');
    }
}