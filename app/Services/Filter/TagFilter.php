<?php

namespace App\Services\Filter;

use App\Services\Filter\AbstractFilter;

class TagFilter extends AbstractFilter
{
    protected $filterName = 'tag';

    protected function applyFilter()
    {
        return $this->builder->whereHas('tags', function($query) {
            $query->where('name', request($this->filterName));
        });
    }
}
