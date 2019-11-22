<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public static function findByName($name)
    {
        return static::whereName($name)->first();
    }

    public function remove()
    {
        optional($this->users)->map->remove();

        $this->delete();
    }
}
