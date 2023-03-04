<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
{
    
    public function handle(Request $request, Closure $next)
    {
        if(!empty(Auth::user())) {
            if(url()->current() == route('admin#loginPage') || url()->current() == route('admin#registerPage')) {
                return back();
            }

            if(Auth::user()->role == 'admin') {
                return back();
            }
            return $next($request);
        }

        return $next($request);
    }
}
