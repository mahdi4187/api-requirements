<?php

namespace App\Http\Filters;

use Closure;

class Category
{
    public function handle($request, Closure $next)
    {
        if (request()->has('category')) {
            return $next($request)->where('category', request()->get('category'));
        }

        return $next($request);
    }
}
