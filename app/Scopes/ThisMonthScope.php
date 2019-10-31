<?php

namespace App\Scopes;

class ThisMonthScope
{
    public static function apply($query)
    {
        return $query->whereBetween('publish_at', [
            today()->subDays(30), today()
        ]);
    }
}