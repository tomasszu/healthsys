<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class Doctor
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->user_class != 2) {
            abort(403);
        }
        return $next($request);
    }
}
