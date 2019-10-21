<?php

namespace App\Services\Filter\Article;

use App\Facades\QueryManager;
use Illuminate\Support\Facades\Auth;

class ArticleFiltersUrlManager
{
    protected $user;

    public function __construct()
    {
        $this->user = request()->route('user') ?? '';
    }

    public function addQuery($routeWithParameter, $routeWithoutParameter, array $query)
    {
        return $this->user
            ? $this->addQueryToRouteWithParameter($routeWithParameter, $query)
            : $this->addQueryToRouteWithoutParameter($routeWithoutParameter, $query);
    }

    public function removeQuery($routeWithParameter, $routeWithoutParameter, $filter)
    {
        return $this->user
            ? route( $routeWithParameter, [$this->user] + QueryManager::remove($filter))
            : route($routeWithoutParameter, QueryManager::remove($filter));
    }

    public function addQueryToRouteWithParameter($route, $query, $parameter = null)
    {
        return route($route, [$parameter ?? $this->user] + QueryManager::build($query));
    }

    public function addQueryToRouteWithoutParameter($route, $query)
    {
        return route($route, QueryManager::build($query));
    }
}