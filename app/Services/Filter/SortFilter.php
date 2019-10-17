<?php

namespace App\Services\Filter;

use App\Services\Filter\AbstractFilter;

class SortFilter extends AbstractFilter
{
    protected $filterName = 'sort';

    protected function applyFilter()
    {
        $filters = ['asc', 'desc'];

        if (in_array(request($this->filterName), $filters)) {
            return optional($this->builder)
                ->orderBy('publish_at', request($this->filterName));
        }
    }
}
