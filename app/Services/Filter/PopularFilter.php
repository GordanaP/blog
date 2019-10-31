<?php

namespace App\Services\Filter;

use App\Scopes\MostLikedScope;
use App\Scopes\MostDislikedScope;
use App\Services\Filter\AbstractFilter;

class PopularFilter extends AbstractFilter
{
    protected $filterName = 'popular';

    protected function applyFilter()
    {
        $filters = ['most_liked', 'most_disliked'];

        if (in_array(request($this->filterName), $filters)) {

            if(request($this->filterName) == 'most_liked') {
                MostLikedScope::apply($this->builder);
            }

            if(request($this->filterName) == 'most_disliked') {
                MostDislikedScope::apply($this->builder);
            }
        }

        return $this->builder;
    }
}
