<?php

namespace App;

use Carbon\Carbon;
use App\Traits\Article\Scopeable;
use App\Traits\Article\HasAttributes;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasAttributes, Scopeable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'excerpt', 'body', 'category_id', 'publish_at', 'status'
    ];

    protected $with = ['category'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'publish_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'status' => 'boolean',
        'is_approved' => 'boolean',
    ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function latest_comments()
    {
        return $this->hasMany(Comment::class)
            ->with('user')
            ->orderBy('created_at','desc');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function addTags(array $tags)
    {
        return $this->tags()->sync($tags);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function hasImage()
    {
        return $this->image;
    }
}
