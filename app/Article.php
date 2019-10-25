<?php

namespace App;

use App\Traits\Article\Scopeable;
use App\Facades\ArticleImageService;
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
        'title', 'excerpt', 'body', 'category_id', 'publish_at', 'is_approved'
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

    public function latest_comments()
    {
        return $this->hasMany(Comment::class)
            ->with('user')
            ->orderBy('created_at','desc');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->orderBy('name', 'asc');
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function ratings()
    {
        return $this->belongsToMany(Rating::class)
            ->as('user')
            ->withPivot('user_id');
    }

    public function wasRatedBy($user = null)
    {
        return $user ? $this->ratings->pluck('user.user_id')->contains($user->id) : '';
    }

    public function addTags(array $tags = null)
    {
        return $tags ? $this->tags()->sync($tags) : '';
    }

    public function hasImage()
    {
        return $this->image;
    }

    public function saveChanges(array $data)
    {
        tap($this)->update($data)->addTags(request('tag_id'));

        ArticleImageService::manage($this, request('image'));
    }

    public function remove()
    {
        ArticleImageService::removeFromStorage($this->image);

        optional($this->image)->delete();

        $this->delete();
    }

    public function averageRating()
    {
        return $this->ratings->avg('star');
    }
}
