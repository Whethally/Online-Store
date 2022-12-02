<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActiveMiddleware
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
        //

        // if ($this->isActive($request)) {
        //     return $next($request);
        // }

        // abort(403);

        if(Auth::check() && (Auth::user()->active == 0)){
            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect()->route('login')->with(danger(__('Ваш аккаунт не активен. Пожалуйста, свяжитесь с администратором.')));

        }

        return $next($request);
    }

    // protected function isActive(Request $request) {
    //     return true;
    // }
}
