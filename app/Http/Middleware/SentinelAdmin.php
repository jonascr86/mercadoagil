<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;
use Redirect;
use Route;

class SentinelAdmin
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
        if(!Sentinel::check()){
            if(Route::getCurrentRoute()->getPath() == '/'){
                return Redirect::to('login');
            }
            return Redirect::to('login')->with('error', 'Você precisa estar logado!');
        }
        elseif(!Sentinel::inRole('admin')){
            return Redirect::to('usuario');
        }

        return $next($request);
    }
}
