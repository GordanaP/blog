<?php

namespace App\Traits\Article;

use App\Rating;

trait Rateable
{
    public function ratings()
    {
        return $this->belongsToMany(Rating::class)
            ->as('user')
            ->withPivot('user_id');
    }

    public function isRatedBy($user = null)
    {
        return $user ? $this->ratings->pluck('user.user_id')->contains($user->id) : '';
    }

    public function ratingGivenBy($user)
    {
        return $this->ratings->pluck('user.rating_id', 'user.user_id')
            ->map(function($ratingId, $userId) use($user) {
                return $userId == $user->id ? $ratingId : null;
            })->filter()->flatten()->first();
    }
}
