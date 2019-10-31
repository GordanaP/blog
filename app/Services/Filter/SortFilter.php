<?php

namespace App\Services\Filter;

use App\Scopes\NewestScope;
use App\Scopes\OldestScope;
use App\Services\Filter\AbstractFilter;

class SortFilter extends AbstractFilter
{
    protected $filterName = 'sort';

    protected function applyFilter()
    {
        $filters = ['latest', 'oldest'];

        if (in_array(request($this->filterName), $filters)) {
            if (request($this->filterName) == 'latest') {
                NewestScope::apply($this->builder);
            }

            if (request($this->filterName) == 'oldest') {
                OldestScope::apply($this->builder);
            }
        }

        return $this->builder;
    }
}
