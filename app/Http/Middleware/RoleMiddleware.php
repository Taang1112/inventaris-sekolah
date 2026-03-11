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
            return redirect('/login');
        }

        // kalau role tidak sesuai
        if (auth()->user()->role != $role) {
            abort(403, 'Akses ditolak');
        }

        return $next($request);
    }
}