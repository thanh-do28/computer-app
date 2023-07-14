<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleCheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // dd(Auth::user());
        if (isset(Auth::user()->role)) {
            if (Auth::user()->role == $role) {
                return redirect('admin');
            } else if (Auth::user()->role == $role) {
                return redirect('home');
            }
        }

        return $next($request);
    }
}
