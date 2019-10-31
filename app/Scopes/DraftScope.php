<?php

namespace App\Scopes;

class DraftScope
{
    public static function apply($query)
    {
        return $query->where('publish_at', null);
    }
}