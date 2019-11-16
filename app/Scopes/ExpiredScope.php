<?php

namespace App\Scopes;

use Carbon\Carbon;

class ExpiredScope
{
    public static function apply($query)
    {
        return $query->where([
            ['is_approved', 0],
            ['publish_at', '<=', Carbon::yesterday()]
        ]);
    }
}