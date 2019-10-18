<?php

namespace App\Services\Filter;

use App\Services\Filter\AbstractFilter;
use App\Services\Filter\Article\ArticleFiltersMap;

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

        return $this->builder;
    }
}
