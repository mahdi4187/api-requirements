<?php

namespace App\Http\Filters;

use Closure;

class Discount
{
    public function handle($request, Closure $next)
    {
        if (request()->has('discount')) {
            return $next($request)
                ->where('category', 'insurance')
                ->orWhere('sku','000003');
        }

        return $next($request);
    }
}
