<?php

namespace App\Http\Middleware;

use Closure;

class adminLogin
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
        //判断后台是否登录
        if (session('jeanuserinfo')){
            return $next($request);
        }else{
            //跳转
            return redirect('admin/login');
        }


        return $next($request);
    }


}
