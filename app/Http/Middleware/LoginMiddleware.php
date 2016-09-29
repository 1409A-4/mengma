<?php

namespace App\Http\Middleware;

use Closure;

class LoginMiddleware
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
        if(!session('uid')){
            return redirect()->action('Admin\LoginCoontroller@loadLogin')->with(['message'=>"请登录！"]);
        }
        if(session('uname')!="admin"){
            if(!in_array($request->path(),session('routename'))){
                return redirect()->action('Admin\LoginCoontroller@loadLogin')->with(['message'=>"您没有此权限！"]);
            }
        }
        return $next($request);
    }
}
