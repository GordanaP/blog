<?php

namespace App\Services\Filter;

use App\Services\Filter\AbstractFilter;

class PopularFilter extends AbstractFilter
{
    protected $filterName = 'popular';

    protected function applyFilter()
    {
        $filters = ['most_liked', 'most_disliked'];

        if (in_array(request($this->filterName), $filters)) {

            if(request($this->filterName) == 'most_liked') {
                return $this->builder->orderBy('approved_count', 'desc');
            }

            if(request($this->filterName) == 'most_disliked') {
                return $this->builder->orderBy('disapproved_count', 'desc');
            }
        }

        return $this->builder;
    }
}
