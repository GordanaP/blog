<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['first_name', 'last_name', 'biography'];

    public function getFullNameAttribute()
    {
        return ucfirst($this->first_name) .' '.ucfirst($this->last_name);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
