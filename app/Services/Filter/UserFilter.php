<?php

namespace App\Services\Filter;

use App\Services\Filter\AbstractFilter;

class UserFilter extends AbstractFilter
{
    protected $filterName = 'user';

    protected function applyFilter()
    {
        return $this->builder->whereHas('user', function($query) {
            $query->where('user_id', request($this->filterName));
        });
    }
}
