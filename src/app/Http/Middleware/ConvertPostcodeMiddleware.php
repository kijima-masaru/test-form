<?php

namespace App\Http\Middleware;

use Closure;

class ConvertPostcodeMiddleware
{
    public function handle($request, Closure $next)
    {
        $postcode = $request->input('postcode');
        $convertedPostcode = mb_convert_kana($postcode, 'a', 'UTF-8');
        $request->merge(['postcode' => $convertedPostcode]);

        return $next($request);
    }
}
