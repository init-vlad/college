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
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->role !== $role) {
            // Redirect based on user's actual role
            $userRole = Auth::user()->role;
            return match($userRole) {
                'admin' => redirect('/admin'),
                'teacher' => redirect('/teacher'),
                'student' => redirect('/student'),
                default => redirect('/')->with('error', 'Доступ запрещен.'),
            };
        }

        return $next($request);
    }
}
