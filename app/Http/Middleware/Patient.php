<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class Patient
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->user_class != 1) {
            abort(403);
        }
        return $next($request);
    }
}
