<?php

namespace App\Scopes;

class OldestScope
{
    public static function apply($query)
    {
        return $query->orderBy('publish_at', 'asc');
    }
}