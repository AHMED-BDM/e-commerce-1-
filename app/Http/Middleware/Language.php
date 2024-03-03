<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;

class Language
{

    public function handle(Request $request, Closure $next)
    {
        if (Session()->has('locale')) {
            App::setlocale(Session()->get('locale'));
        } else {
            App::setlocale(config('app.fallback_locale'));
        }
        return $next($request);
    }
}
