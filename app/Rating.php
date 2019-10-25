<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    public function articles()
    {
        return $this->belongsToMany(Article::class)
            ->as('user')
            ->withPivot('user_id');
    }
}
