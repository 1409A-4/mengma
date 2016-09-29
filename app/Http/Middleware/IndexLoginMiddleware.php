<?php

namespace App\Http\Middleware;

use Closure;

class IndexLoginMiddleware
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
        if(!session('name')){
            return redirect('/')->with(['message'=>"请登录！"]);
        }
        return $next($request);
    }
}
