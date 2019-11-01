<?php

namespace App\Services\Filter;

use App\User;
use App\Scopes\UserScope;
use App\Services\Filter\AbstractFilter;

class UserFilter extends AbstractFilter
{
    protected $filterName = 'user';

    protected function applyFilter()
    {
        return $this->builder->whereHas('user', function($query) {
            $query->where('name', request($this->filterName));
        });
    }
}
