<?php

namespace App\Traits\Comment;

use App\User;

trait Likeable
{
    public function likings()
    {
        return $this->belongsToMany(User::class, 'comment_liking')
            ->withPivot('is_liked');
    }

    public function likes_count()
    {
        $count = $this->likings->pluck('pivot.is_liked')
            ->filter(function($value, $key){
                return $value == 1;
            })->count();

        return $count > 0 ? $count : '';
    }

    public function dislikes_count()
    {
        $count = $this->likings->pluck('pivot.is_liked')
            ->filter(function($value, $key){
                return $value == 0;
            })->count();

        return $count > 0 ? $count : '';
    }

    public function isLikedBy($user = null)
    {
        if($user) {
            return $this->likings
                ->where('pivot.user_id', $user->id)
                ->where('pivot.is_liked', 1)
                ->isNotEmpty();
        }
    }

    public function isDislikedBy($user = null)
    {
        if($user) {
            return $this->likings
                ->where('pivot.user_id', $user->id)
                ->where('pivot.is_liked', 0)
                ->isNotEmpty();
        }
    }

    public function isLikedOrDislikedBy($user = null)
    {
        if($user) {
            return $this->likings
                ->contains('pivot.user_id', $user->id);
        }
    }

    public function getLikingBy($user)
    {
        $this->likings()
            ->attach($user, ['is_liked' => request('is_liked')]);
    }
}
