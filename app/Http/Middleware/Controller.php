<?php

namespace App\Http\Middleware;

use Closure;

class Controller
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
        echo '我是控制器中间件';
        return $next($request);
    }
}
