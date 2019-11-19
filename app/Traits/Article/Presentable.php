<?php

namespace App\Traits\Article;

use Carbon\Carbon;

trait Presentable
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

    public function getIsDraftAttribute()
    {
        return is_null($this->publish_at);
    }

    public function getIsExpiredAttribute()
    {
        return ! $this->is_approved && $this->publish_at <= Carbon::yesterday();
    }

    public function getIsPendingAttribute()
    {
        return ! $this->is_approved &&
        (optional($this->publish_at)->isToday() || optional($this->publish_at)->isFuture());
    }

    public function getIsWaitingPublishingAttribute()
    {
        return $this->is_approved && optional($this->publish_at)->isFuture();
    }

    public function getIsPublishedAttribute()
    {
        return $this->is_approved && optional($this->publish_at)->isPast();
    }

    public function getAverageRatingAttribute()
    {
        return $this->ratings->avg('star');
    }

    public function getStatusAttribute()
    {
        if ($this->is_waiting_publishing) {
            $status = 'Wait publishing';
        } elseif ($this->is_published) {
            $status = 'Published';
        } elseif ($this->is_pending) {
            $status = 'Pending';
        } elseif ($this->is_expired) {
            $status = 'Expired';
        } elseif ($this->is_draft) {
            $status = 'Draft';
        } else {
            '';
        }

        return $status;
    }

    public function getStatusColorAttribute()
    {
        if ($this->is_waiting_publishing || $this->is_published) {
            $class = 'text-green-400';
        } elseif($this->is_pending || $this->is_draft) {
            $class = 'text-orange-400';
        } elseif($this->is_expired) {
            $class = 'text-red-400';
        } else {
            '';
        }

        return $class;
    }
}
