<?php

namespace App\Services\Filter;

use Carbon\Carbon;
use App\Services\Filter\AbstractFilter;

class StatusFilter extends AbstractFilter
{
    protected $filterName = 'status';

    protected function applyFilter()
    {
        $filters = $filters = ['published', 'approved', 'pending', 'expired', 'draft'];

        if (in_array(request($this->filterName), $filters)) {
            if(request($this->filterName) == 'published') {
                return $this->builder->where('is_approved', 1)
                    ->where('publish_at', '<=', today());
            }

            if(request($this->filterName) == 'approved') {
                return $this->builder->where('is_approved', 1)
                    ->where('publish_at', '>', today());
                ;
            }

            if(request($this->filterName) == 'pending') {
                return $this->builder->where('is_approved', 0)
                    ->where('publish_at', '>', today());
                ;
            }

            if(request($this->filterName) == 'expired') {
                return $this->builder->where('is_approved', 0)
                    ->where('publish_at', '<=', today());
                ;
            }

            if(request($this->filterName) == 'draft') {
                return $this->builder->where('publish_at', null);
            }
        }

        return $this->builder;
    }
}