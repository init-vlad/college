<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class DebugFilamentAuth
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        Log::info('DebugFilamentAuth: Checking authentication', [
            'url' => $request->url(),
            'path' => $request->path(),
            'method' => $request->method(),
            'is_authenticated' => Auth::check(),
            'user_id' => Auth::check() ? Auth::id() : null,
            'user_role' => Auth::check() ? Auth::user()->role : null,
            'session_id' => $request->hasSession() ? $request->session()->getId() : null,
            'app_env' => app()->environment(),
            'guards' => config('auth.guards'),
            'default_guard' => config('auth.defaults.guard'),
        ]);

        if (!Auth::check()) {
            Log::warning('DebugFilamentAuth: User not authenticated, redirecting to login', [
                'url' => $request->url(),
                'session_data' => $request->hasSession() ? $request->session()->all() : null,
            ]);
            
            return redirect()->guest(route('login'));
        }

        $user = Auth::user();
        
        Log::info('DebugFilamentAuth: User authenticated, checking role', [
            'user_id' => $user->id,
            'user_email' => $user->email,
            'user_role' => $user->role,
            'user_attributes' => $user->getAttributes(),
        ]);

        return $next($request);
    }
} 