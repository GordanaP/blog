<?php

namespace App\Services\Filter;

use App\Scopes\DraftScope;
use App\Scopes\ExpiredScope;
use App\Scopes\PendingScope;
use App\Scopes\ApprovedScope;
use App\Scopes\PublishedScope;
use App\Services\Filter\AbstractFilter;

class StatusFilter extends AbstractFilter
{
    protected $filterName = 'status';

    protected function applyFilter()
    {
        $filters = ['published', 'approved', 'pending', 'expired', 'draft'];

        if (in_array(request($this->filterName), $filters)) {
            if(request($this->filterName) == 'published'){
                PublishedScope::apply($this->builder);
            }

            if(request($this->filterName) == 'approved') {
                ApprovedScope::apply($this->builder);
            }

            if(request($this->filterName) == 'pending') {
                PendingScope::apply($this->builder);
            }

            if(request($this->filterName) == 'expired') {
                ExpiredScope::apply($this->builder);
            }

            if(request($this->filterName) == 'draft') {
                DraftScope::apply($this->builder);
            }
        }

        return $this->builder;
    }
}
