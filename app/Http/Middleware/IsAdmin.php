<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
// use App\Http\Controllers\LoginController;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check() || !auth()->user()->role) {
            abort(403);
        }

        return $next($request);

        // if (in_array($request->user()->admin, $admins)) {
        //     return $next($request);
        // }
        // return redirect('/');
    }
}