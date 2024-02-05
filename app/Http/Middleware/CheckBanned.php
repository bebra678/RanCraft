<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;

class CheckBanned
{
    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {
        $user = $this->auth->user();
        if($user->isBanned())
        {
          //  \Session::flush();
        //if (auth()->check() && auth()->user()->banned_until) {
            //$banned_days = now()->diffInDays(auth()->user()->banned_until);
            //auth()->logout();

//            if ($banned_days > 14) {
//                $message = 'Ваш аккаунт был забанен. Пожалуйста, свяжитесь с администратором.';
//            } else {
//                $message = 'Ваш аккаунт заблокирован на ' . $banned_days . ' ' . str_plural('day', $banned_days) . '. Пожалуйста, свяжитесь с администратором.';
//            }
            //$message = 'Ваш аккаунт был забанен. Пожалуйста, свяжитесь с администратором.';
            // redirect()->route('login')->withMessage($message);
            abort(403);
        }

        return $next($request);
    }
}
