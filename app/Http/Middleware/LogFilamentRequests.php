<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LogFilamentRequests
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $startTime = microtime(true);
        
        // Логируем входящий запрос
        Log::info('Filament Request Started', [
            'method' => $request->method(),
            'url' => $request->fullUrl(),
            'path' => $request->path(),
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'referer' => $request->header('referer'),
            'session_id' => $request?->session()?->getId(),
            'csrf_token' => $request?->session()?->token(),
            'headers' => [
                'x-forwarded-for' => $request->header('x-forwarded-for'),
                'x-forwarded-proto' => $request->header('x-forwarded-proto'),
                'x-forwarded-host' => $request->header('x-forwarded-host'),
                'x-forwarded-port' => $request->header('x-forwarded-port'),
                'host' => $request->header('host'),
                'connection' => $request->header('connection'),
            ],
            'is_secure' => $request->secure(),
            'scheme' => $request->getScheme(),
            'user_authenticated' => Auth::check(),
            'user_id' => Auth::check() ? Auth::id() : null,
            'user_role' => Auth::check() ? Auth::user()->role : null,
        ]);

        $response = $next($request);
        
        $endTime = microtime(true);
        $duration = ($endTime - $startTime) * 1000; // в миллисекундах

        // Логируем ответ
        Log::info('Filament Request Completed', [
            'method' => $request->method(),
            'url' => $request->fullUrl(),
            'status_code' => $response->getStatusCode(),
            'duration_ms' => round($duration, 2),
            'content_type' => $response->headers->get('content-type'),
            'session_id' => $request->session()->getId(),
            'user_id' => Auth::check() ? Auth::id() : null,
            'response_headers' => [
                'location' => $response->headers->get('location'),
                'set-cookie' => $response->headers->get('set-cookie'),
            ],
        ]);

        // Если статус ошибки, логируем дополнительную информацию
        if ($response->getStatusCode() >= 400) {
            Log::warning('Filament Request Error', [
                'method' => $request->method(),
                'url' => $request->fullUrl(),
                'status_code' => $response->getStatusCode(),
                'user_id' => Auth::check() ? Auth::id() : null,
                'user_role' => Auth::check() ? Auth::user()->role : null,
                'session_data' => $request->session()->all(),
                'response_content_preview' => substr($response->getContent(), 0, 500),
            ]);
        }

        return $response;
    }
} 