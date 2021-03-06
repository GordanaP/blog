<?php

namespace App\Scopes;

class PendingScope
{
    public static function apply($query)
    {
        return $query->where([
            ['is_approved', 0],
            ['publish_at', '>', today()]
        ]);
    }
}