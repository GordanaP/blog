<?php

namespace App;

use App\Traits\Likeable;
use App\Traits\DatePresenter;
use App\Scopes\LikesCountScope;
use App\Traits\Article\Rateable;
use App\Traits\Article\Scopeable;
use App\Scopes\CommentsCountScope;
use App\Scopes\DislikesCountScope;
use App\Traits\Article\Presentable;
use App\Facades\ArticleImageService;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use DatePresenter, Presentable, Likeable, Rateable, Scopeable;

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
     * @var array+
     */
    protected $casts = [
        'is_approved' => 'boolean',
    ];

    protected $appends = [ 'average_rating' ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new CommentsCountScope);
        static::addGlobalScope(new LikesCountScope);
        static::addGlobalScope(new DislikesCountScope);
    }

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
        return $this->comments()
            ->with('user', 'likes')
            ->withCount([
                'likes as approved_count' => function ($query) {
                    $query->where('is_liked', 1);
                },
                'likes as disapproved_count' => function ($query) {
                    $query->where('is_liked', 0);
                },
            ])
            ->latest();
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

    public function getAuthor()
    {
        return optional($this->user->profile)->full_name ?? $this->user->email;
    }

    public function getAuthorRoute()
    {
        return $this->user->profile
            ? route('admin.profiles.show', $this->user->profile)
            : route('admin.users.show', $this->user);
    }

    public function remove()
    {
        ArticleImageService::removeFromStorage($this->image);

        optional($this->image)->delete();

        $this->delete();
    }
}
