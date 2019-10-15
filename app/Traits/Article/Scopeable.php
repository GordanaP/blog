<?php

namespace App\Traits\Article;

trait Scopeable
{
    public function scopeDraft($query)
    {
        return $query->where('publish_at', null);
    }

    public function scopeUnpublished($query)
    {
        return $query->where('is_approved', 0);
    }

    public function scopeExpired($query)
    {
        return $query->where('is_approved', 0)
            ->where('publish_at', '<=', today());
        ;
    }

    public function scopePending($query)
    {
        return $query->where('is_approved', 0)
            ->where('publish_at', '>', today());
        ;
    }

    public function scopeWaitPublishing($query)
    {
        return $query->where('is_approved', 1)
            ->where('publish_at', '>', today());
        ;
    }

    public function scopePublished($query)
    {
        return $query->where('is_approved', 1)
            ->where('publish_at', '<=', today());
    }
}
