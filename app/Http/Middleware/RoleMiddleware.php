<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string ...$role): Response
    {
        if (!auth()->check()) {
            abort(401, 'Not aurhenticated');
        }

        if (!auth()->user()->roles()->whereIn('name', $role)->exists()) {
            abort(403, 'User doesn\'t have permission to perfom this action');
        }

        return $next($request);
    }
}
