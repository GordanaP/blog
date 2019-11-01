<?php

namespace App\Scopes;

class MostDislikedScope
{
    public static function apply($query)
    {
        return $query->orderBy('disapproved_count', 'desc');
    }
}