<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            return route($this->getLoginPage($request));
        }
    }

    public function handle($request, Closure $next, ...$guards)
    {
        if ($request->header('Device') != 'app') {

            if (!auth()->check()) {
                return redirect($this->getLoginPage($request));
            }
        }

        $this->authenticate($request, $guards);

        return $next($request);
    }

    protected function unauthenticated($request, array $guards)
    {
        if ($request->wantsJson())
            abort(response()->json(['success' => false, 'message' => 'Unauthenticated'], 401));
    }

    private function getLoginPage(Request $request)
    {
        return $request->segment(1) != 'gopanel' ? RouteServiceProvider::LOGIN : RouteServiceProvider::GOPANEL_LOGIN;
    }
}
