<?php

namespace App;

use App\Traits\DatePresenter;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use DatePresenter;

    protected $fillable = ['name'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }

    public function remove()
    {
        optional($this->articles)->map->remove();

        $this->delete();
    }
}
