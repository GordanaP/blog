<?php

namespace App;

use App\Traits\DatePresenter;
use App\Scopes\AccountsCountScope;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use DatePresenter;

    protected $fillable = ['name'];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new AccountsCountScope);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getNameFormattedAttribute()
    {
        return ucwords($this->name);
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
