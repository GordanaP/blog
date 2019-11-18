<?php

namespace App\Traits;

use Carbon\Carbon;

trait DatePresenter
{
    public function getPublishAtDBFormattedAttribute()
    {
        return optional($this->publish_at)->format('Y-m-d');
    }

    public function getPublishAtReadableAttribute()
    {
        return optional($this->publish_at)->diffForHumans();
    }

    public function getPublishAtFormattedAttribute()
    {
        return optional($this->publish_at)->format('d M Y') ?? 'n/a';
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d M Y');
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d M Y');
    }
}
