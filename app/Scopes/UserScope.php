<?php

namespace App\Scopes;

class UserScope
{
    public static function apply($query, $user)
    {
        return $query->where('user_id', $user->id);
    }
}