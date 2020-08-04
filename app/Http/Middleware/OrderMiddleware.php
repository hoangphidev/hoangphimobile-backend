<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class OrderMiddleware
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
        if (Auth::user()->position_id == 1 || Auth::user()->position_id == 2 || Auth::user()->position_id == 3) {
            return $next($request);
        }else {
            return redirect('admin/404');
        }
    }
}