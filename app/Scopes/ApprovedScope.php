<?php

namespace App\Scopes;

class ApprovedScope
{
    public static function apply($query)
    {
        return $query->where([
            ['is_approved', 1],
            ['publish_at', '>', today()]
        ]);
    }
}