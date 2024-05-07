<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserHasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Memeriksa apakah pengguna telah login
        if (Auth::check()) {
            // Memeriksa apakah peran pengguna saat ini termasuk dalam peran yang diizinkan
            $user = Auth::user();
            foreach ($roles as $role) {
                if ($user->role === $role) {
                    return $next($request);
                }
            }
        }

        // Jika pengguna tidak memiliki peran yang diizinkan, kembalikan respons status 403 (Forbidden)
        return response()->view('abort\unauthorized', [], 403);
    }
}
