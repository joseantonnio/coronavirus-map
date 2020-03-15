<?php

namespace App\Http\Middleware;

use Closure;

class CheckIp
{
    
    public $whiteIps = ['127.0.0.1', 'localhost'];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!in_array($request->ip(), $this->whiteIps)) {
            return response(403);
        }

        return $next($request);
    }
}
