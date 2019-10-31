<?php

namespace App\Services\Filter;

use App\Scopes\OlderScope;
use App\Scopes\LastMonthScope;
use App\Scopes\ThisMonthScope;
use App\Services\Filter\AbstractFilter;

class ArchiveFilter extends AbstractFilter
{
    protected $filterName = 'archive';

    protected function applyFilter()
    {
        $filters = ['this_month', 'last_month', 'older'];

        if (in_array(request($this->filterName), $filters)) {
            if(request($this->filterName) == 'this_month') {
                ThisMonthScope::apply($this->builder);
            }

            if(request($this->filterName) == 'last_month') {
                LastMonthScope::apply($this->builder);
            }

            if(request($this->filterName) == 'older') {
                OlderScope::apply($this->builder);
            }
        }

        return $this->builder;
    }
}
