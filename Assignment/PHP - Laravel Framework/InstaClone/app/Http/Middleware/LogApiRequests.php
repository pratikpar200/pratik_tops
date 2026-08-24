<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class LogApiRequests
{
    /**
     * Handle an incoming request.
     *
     * Original AI-generated logic logged:
     * - authenticated user ID
     * - request method + URL
     * - timestamp (Laravel's Log facade adds this automatically)
     *
     * Adapted for InstaClone: uses Log::info() to match the existing
     * logging style already used in SendOrderNotification (Session 17),
     * and only logs when a user is actually authenticated via Sanctum.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if ($request->user()) {
            Log::info('API Request Log: User ID #' . $request->user()->id .
                ' accessed [' . $request->method() . '] ' . $request->path());
        }

        return $response;
    }
}