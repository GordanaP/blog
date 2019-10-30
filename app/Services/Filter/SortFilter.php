<?php

namespace App\Services\Filter;

use App\Services\Filter\AbstractFilter;

class SortFilter extends AbstractFilter
{
    protected $filterName = 'sort';

    protected function applyFilter()
    {
        $filters = ['latest', 'oldest'];

        if (in_array(request($this->filterName), $filters)) {
            if (request($this->filterName) == 'latest') {
                return optional($this->builder)
                    ->orderBy('publish_at', 'desc');
            }

            return optional($this->builder)
                ->orderBy('publish_at', 'asc');
        }

        return $this->builder;
    }
}
