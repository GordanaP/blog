<?php

namespace App\Services\Filter;

use Carbon\Carbon;
use App\Services\Filter\AbstractFilter;

class ArchiveFilter extends AbstractFilter
{
    protected $filterName = 'archive';

    protected function applyFilter()
    {
        $filters = ['this_month', 'last_month', 'older'];

        if (in_array(request($this->filterName), $filters)) {
            if(request($this->filterName) == 'this_month') {
                return $this->builder->whereBetween('publish_at', [
                    today()->subDays(30), today()
                ]);
            }

            if(request($this->filterName) == 'last_month') {
                return $this->builder->whereBetween('publish_at', [
                    today()->subDays(60), today()->subDays(30)
                ]);
            }

            if(request($this->filterName) == 'older') {
                return $this->builder->where('publish_at', '<', today()->subDays(60));
            }
        }

        return $this->builder;
    }
}
