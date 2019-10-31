<?php

namespace App\Scopes;

class PublishedScope
{
    public static function apply($query)
    {
        return $query->where([
            ['is_approved', 1],
            ['publish_at', '<=', today()]
        ]);
    }
}