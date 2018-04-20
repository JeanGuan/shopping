<?php

namespace App\Http\Middleware;

use Closure;

class homeLogin
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
        //判断前台是否登录
        if (session('Homeuserinfo')){
            return $next($request);
        }else{
            //跳转
            return redirect('/login');
        }


        return $next($request);
    }


}
