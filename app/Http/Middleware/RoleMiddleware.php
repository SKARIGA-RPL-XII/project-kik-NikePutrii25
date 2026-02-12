<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        // kalau belum login
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // kalau role tidak sesuai
        if (auth()->user()->role !== $role) {
            abort(403, 'Anda tidak punya akses');
        }

        return $next($request);
    }
}
