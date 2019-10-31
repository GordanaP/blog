<?php

namespace App\Scopes;

class NewestScope
{
    public static function apply($query)
    {
        return $query->orderBy('publish_at', 'desc');
    }
}