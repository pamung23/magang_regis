<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {
        if ($guard === 'akademik' && Auth::guard($guard)->check()) {
            return redirect('/admin');
        }
        if ($guard === 'kaprodi' && Auth::guard($guard)->check()) {
            return redirect('/kaprodi');
        }
        if ($guard === 'mahasiswa' && Auth::guard($guard)->check()) {
            return redirect('/');
        }

        return $next($request);
    }
}
