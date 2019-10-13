<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'excerpt', 'body'];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = ucwords($value);
    }

    public function setExcerptAttribute($value)
    {
        $this->attributes['excerpt'] = ucfirst($value);
    }

    public function setBodyAttribute($value)
    {
        $this->attributes['body'] = ucfirst($value);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
