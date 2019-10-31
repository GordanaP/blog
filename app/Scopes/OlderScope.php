<?php

namespace App\Scopes;

class OlderScope
{
    public static function apply($query)
    {
        return $query->where('publish_at', '<', today()->subDays(60));
    }
}