<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (auth()->user()->is_admin == 1) {
            return $next($request);
            return redirect()->route('admin');
        } else {
            return redirect()->route('notfound')->with('error', 'Not Found');
        }
    }
}
