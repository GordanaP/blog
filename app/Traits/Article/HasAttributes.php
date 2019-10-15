<?php

namespace App\Traits\Article;

use App\Facades\DateFormatter;

trait HasAttributes
{
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

    public function getPublishAtReadableAttribute()
    {
        return optional($this->publish_at)->diffForHumans();
    }

    public function getIsDraftAttribute()
    {
        return is_null($this->publish_at);
    }

    public function getIsUnpublishedAttribute()
    {
        return ! $this->is_approved;
    }

    public function getIsExpiredAttribute()
    {
        return ! $this->is_approved && optional($this->publish_at)->isPast();
    }

    public function getIsPendingAttribute()
    {
        return ! $this->is_approved && optional($this->publish_at)->isFuture();
    }

    public function getIsWaitingPublishingAttribute()
    {
        return $this->is_approved && optional($this->publish_at)->isFuture();
    }

    public function getIsPublishedAttribute()
    {
        return $this->is_approved && optional($this->publish_at)->isPast();
    }
}
