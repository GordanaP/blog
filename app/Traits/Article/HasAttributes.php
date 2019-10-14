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
        return DateFormatter::readable($this->publish_at);
    }
}