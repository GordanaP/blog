<?php

namespace App\Services\Filter;

use App\Services\Filter\AbstractFilter;

class CategoryFilter extends AbstractFilter
{
    protected $filterName = 'category';

    protected function applyFilter()
    {
        return $this->builder->whereHas('category', function($query) {
            $query->where('name', request($this->filterName));
        });
    }
}
