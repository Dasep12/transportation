<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (session("isLogin") !== 1 or Session('roles') == "Drivers") {
            session()->flush();
            return redirect("/logout")->with(["error" => 'Session ended']);
        }
        return $next($request);
    }
}
