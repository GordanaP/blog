<?php

namespace App\Traits;

use App\User;

trait Likeable
{
    public function likes()
    {
        return $this->morphToMany(User::class, 'likeable')
            ->withPivot('is_liked')->as('status');
    }

    public function likes_count()
    {
        $count = $this->likes->pluck('status.is_liked')
            ->filter(function($value, $key){
                return $value == 1;
            })->count();

        return $count > 0 ? $count : '';
    }

    public function dislikes_count()
    {
        $count = $this->likes->pluck('status.is_liked')
            ->filter(function($value, $key){
                return $value == 0;
            })->count();

        return $count > 0 ? $count : '';
    }

    public function isLikedBy($user = null)
    {
        if($user) {
            $this->likes
            ->where('status.user_id', $user->id)
            ->where('status.is_liked', 1)
            ->isNotEmpty();
        }
    }

    public function isDislikedBy($user = null)
    {
        if($user) {
            return $this->likes->where([
                'status.user_id' => $user->id,
                'status.is_liked' => 0
            ])
            ->count();
        }
    }

    public function isLikedOrDislikedBy($user = null)
    {
        if($user) {
            return $this->likes
                ->contains('status.user_id', $user->id);
        }
    }

    public function getLikeOrDislikeFrom($user)
    {
        $this->likes()
            ->attach($user, ['is_liked' => request('is_liked')]);
    }
}
