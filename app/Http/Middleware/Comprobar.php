<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Comprobar
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check()) {
            return response()->json([
                'fallo' => 'No esta logeado correctamente'
            ],401);
        }
        return $next($request);
    }
}
