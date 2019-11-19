<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckArticleStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (! $request->article->is_published &&
            (Auth::guest() || Auth::check() &&
            (Auth::user()->cannotAccessUnpublished($request->article))))
        {
            return redirect('/');
        }

        return $next($request);
    }
}
