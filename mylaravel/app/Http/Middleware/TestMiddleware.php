<?php

namespace App\Http\Middleware;

use Closure;

class TestMiddleware
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
        //记录该请求的路径
        $path = $request -> path();
        //将字符串路径存入到日志文件中
        file_put_contents('request.log',date("Y-m-d H:i:s",time())."[".$request->ip()."]-----".$path."\r\n",FILE_APPEND);
        //进入下一层的代码执行
        return $next($request);
    }
}
