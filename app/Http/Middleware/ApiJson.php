<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApiJson
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $accept = $request->header('Accept');
        if ($accept != 'application/json') {
            return response(['success' => false, 'message' => 'Please accept response as JSON'], 401);
        }
        return $next($request);
    }
}
