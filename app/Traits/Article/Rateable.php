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
        return $this->ratings->where('user.user_id', $user->id)->first()->star;
    }
}
