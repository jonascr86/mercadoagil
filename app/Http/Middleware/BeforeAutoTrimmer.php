<?php namespace App\Http\Middleware;

use Closure;

class BeforeAutoTrimmer {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $postValues = array_filter($request->all(), function($val){
            return is_scalar($val);
        });
        
        $request->merge(array_map('trim', $postValues));
        
        return $next($request);
    }
}