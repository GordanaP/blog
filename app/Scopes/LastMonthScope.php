<?php

namespace App\Scopes;

class LastMonthScope
{
    public static function apply($query)
    {
        return $query->whereBetween('publish_at', [
            today()->subDays(60), today()->subDays(30)
        ]);
    }
}