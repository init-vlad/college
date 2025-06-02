<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class ForceHttps
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Принудительный HTTPS только на production
        // if (app()->environment('production') && !$request->secure()) {
        //     Log::info('Redirecting HTTP to HTTPS', [
        //         'original_url' => $request->fullUrl(),
        //         'secure_url' => str_replace('http://', 'https://', $request->fullUrl()),
        //         'headers' => [
        //             'x-forwarded-proto' => $request->header('x-forwarded-proto'),
        //             'x-forwarded-for' => $request->header('x-forwarded-for'),
        //         ]
        //     ]);
            
        //     return redirect()->secure($request->getRequestUri(), 301);
        // }

        return $next($request);
    }
} 