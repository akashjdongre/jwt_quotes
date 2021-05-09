<?php

namespace App\Http\Middleware;

use Closure;

class convertInUrl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $input = $request->all();

        if (isset($input['url'])) {
            $input['url'] = strtolower(str_replace(" ","-",$input['url']));

            // Input modification
            $request->replace($input);

           // \Log::info($request->all()); // Shows modified request
        }
        return $next($request);
    }
}
