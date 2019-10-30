<?php

namespace App;

use App\Traits\Article\Rateable;
use App\Traits\Likeable;
use App\Traits\Article\Scopeable;
use App\Facades\ArticleImageService;
use App\Traits\Article\HasAttributes;
use App\Services\Article\ManageArticle;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasAttributes, Likeable, Rateable, Scopeable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'excerpt', 'body', 'category_id', 'publish_at', 'is_approved'
    ];

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
        'is_approved' => 'boolean',
    ];

    protected $appends = ['average_rating'];

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
        return $this->belongsTo(User::class)->with('profile');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->orderBy('name', 'asc');
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function latest_comments()
    {
        return $this->hasMany(Comment::class)
            ->with('user', 'likes')
            ->orderBy('created_at','desc');
    }

    public function hasImage()
    {
        return $this->image;
    }

    public function addTags($tags)
    {
        return $this->tags()->sync($tags);
    }

    public function addUser($user)
    {
       $this->user()->associate($user)->save();

       return $this;
    }
}
