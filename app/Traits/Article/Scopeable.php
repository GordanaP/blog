<?php

namespace App\Traits\Article;

use App\Scopes\UserScope;
use App\Scopes\NewestScope;
use App\Scopes\PublishedScope;

trait Scopeable
{
    public function scopePublished($query)
    {
        return PublishedScope::apply($query);
    }

    public function scopeFilter($query, $postFilterService)
    {
        return $postFilterService->apply($query);
    }

    public function scopeNewest($query)
    {
        return NewestScope::apply($query);
    }

    public function scopeOwnedBy($query, $user)
    {
        return $query->where('user_id', $user->id);
    }
}
