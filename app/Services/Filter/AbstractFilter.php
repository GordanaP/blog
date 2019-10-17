<?php

namespace App\Services\Filter;

use Closure;

abstract class AbstractFilter
{
    /**
     * The filter name.
     *
     * @var string
     */
    protected $filterName;

    /**
     * The query builder.
     *
     * @var \Illuminate\Database\Eloquent\Builder $builder
     */
    protected $builder;

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Support\Request  $request
     * @param  Closure $next
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function handle($request, Closure $next)
    {
        $this->builder = $next($request);

        if(! request()->has($this->filterName)) {
            return $next($request);
        }

        return $this->applyFilter();
    }

    /**
     * Apply the filter.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected abstract function applyFilter();
}
