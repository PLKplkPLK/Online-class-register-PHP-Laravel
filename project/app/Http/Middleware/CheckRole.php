<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, int $role): \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
    {
        if ($request->user()!=null and (!$request->user()->hasRole($role))) {
            abort(401, 'Nie możesz wykonać tej akcji');
        }
        return $next($request);
    }
}
