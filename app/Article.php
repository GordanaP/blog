<?php

namespace App;

use App\Traits\Article\HasAttributes;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasAttributes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'excerpt', 'body', 'category_id', 'publish_at', 'status'
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
        'status' => 'boolean',
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

    public function scopePublished($query)
    {
        return $query->where('status', 1)
            ->where('publish_at', '<=', today());
    }

    public function scopeUnpublished($query)
    {
        return $query->where('status', 0);
    }

    public function scopeWaitPublishing($query)
    {
        return $query->where('status', 1)
            ->where('publish_at', '>', today());
        ;
    }

    public function scopeWaitApproval($query)
    {
        return $query->where('status', 0)
            ->where('publish_at', '>=', today());
        ;
    }

    public function scopeMissedPublishing($query)
    {
        return $query->where('status', 0)
            ->where('publish_at', '<', today());
        ;
    }

    public function isWaitingApproval()
    {
        return $this->status == 0 && $this->publish_at >= today();
    }

    public function isWaitingPublishing()
    {
        return $this->status == 1 && $this->publish_at > today();
    }

    public function isApproved()
    {
        return $this->status == 1;
    }

    public function isPublished()
    {
        return $this->status == 1 && $this->publish_at <= today();
    }

    public function missedPublishing()
    {
        return $this->status == 0 && $this->publish_at < today();
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->orderBy('name', 'asc');
    }

    public function addTags(array $tags)
    {
        return $this->tags()->sync($tags);
    }
}
