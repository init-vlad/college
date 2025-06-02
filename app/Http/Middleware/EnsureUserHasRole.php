<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
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
        // Логируем начало проверки
        Log::info('EnsureUserHasRole middleware triggered', [
            'required_role' => $role,
            'request_url' => $request->url(),
            'request_path' => $request->path(),
            'user_agent' => $request->userAgent(),
            'ip_address' => $request->ip(),
            'session_id' => $request->hasSession() ? $request->session()->getId() : null,
        ]);

        if (!Auth::check()) {
            Log::warning('User not authenticated', [
                'required_role' => $role,
                'request_url' => $request->url(),
                'session_id' => $request->hasSession() ? $request->session()->getId() : null,
                'auth_guard' => Auth::getDefaultDriver(),
            ]);
            return redirect()->route('login');
        }

        $user = Auth::user();
        
        // Детальное логирование пользователя
        Log::info('User authenticated', [
            'user_id' => $user->id,
            'user_email' => $user->email,
            'user_role' => $user->role,
            'required_role' => $role,
            'user_name' => $user->name,
            'user_group_id' => $user->group_id ?? null,
            'request_url' => $request->url(),
            'session_id' => $request->hasSession() ? $request->session()->getId() : null,
        ]);

        if ($user->role !== $role) {
            $userRole = $user->role;
            
            Log::warning('Role mismatch - Access denied', [
                'user_id' => $user->id,
                'user_email' => $user->email,
                'user_role' => $userRole,
                'required_role' => $role,
                'request_url' => $request->url(),
                'will_redirect_to' => match($userRole) {
                    'admin' => '/admin',
                    'teacher' => '/teacher',
                    'student' => '/student',
                    default => '/',
                },
                'session_id' => $request->hasSession() ? $request->session()->getId() : null,
            ]);

            // Redirect based on user's actual role
            return match($userRole) {
                'admin' => redirect('/admin'),
                'teacher' => redirect('/teacher'),
                'student' => redirect('/student'),
                default => redirect('/')->with('error', 'Доступ запрещен.'),
            };
        }

        Log::info('Role check passed - Access granted', [
            'user_id' => $user->id,
            'user_email' => $user->email,
            'user_role' => $user->role,
            'required_role' => $role,
            'request_url' => $request->url(),
            'session_id' => $request->hasSession() ? $request->session()->getId() : null,
        ]);

        return $next($request);
    }
}
