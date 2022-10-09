<?php

namespace App\Http\Filters;

use Closure;

class Price
{
    public function handle($request, Closure $next)
    {
        if (request()->has('price')) {
            return $next($request)->where('price', request()->get('price'));
        }

        return $next($request);
    }
}
