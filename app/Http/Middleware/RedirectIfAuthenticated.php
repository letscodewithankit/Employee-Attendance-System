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
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

//        dd($guards[0]);
        switch ($guards[0]){
            case 'admin':
                if (Auth::guard($guards[0])->check()) {
                    return redirect(route('dashboardview'));
                }
                break;

            case 'employee':
                if (Auth::guard($guards[0])->check()) {
                    return redirect(route('employee_dashboard'));
                }
                break;

            default:
                if (Auth::guard($guards[0])->check()) {
                    return redirect(RouteServiceProvider::HOME);
                }
            }
//        foreach ($guards as $guard) {
//            if (Auth::guard($guard)->check()) {
//                return redirect(RouteServiceProvider::HOME);
//            }
//        }

        return $next($request);
    }
}
