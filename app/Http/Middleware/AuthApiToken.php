<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class AuthApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //Make sure bearer token is set in the header and that it matches the string within the environment file
        if (!$request->header('Authorization') || !Str::contains($request->header('Authorization'), env('API_TOKEN'))) {
            return response()->json(['error' => 'Authorisation missing'], 401);
        }

        return $next($request);
    }
}
