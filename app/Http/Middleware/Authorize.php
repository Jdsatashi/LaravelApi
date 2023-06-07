<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Authorize
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\JsonResponse
     */
    public function handle()
    {
        return response()->json(['message' => 'You must login to access this page.'], 401);

    }
}
