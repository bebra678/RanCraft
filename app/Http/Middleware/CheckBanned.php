<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CheckBanned
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->isBanned()) {
            Auth::logout();
            return redirect('/ban/info')->with('error', 'You are banned.');
        }

        return $next($request);
    }
}
