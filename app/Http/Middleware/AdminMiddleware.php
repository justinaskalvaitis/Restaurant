<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!Auth::check() || Auth::check() && !Auth::user()->isAdmin())
        {
            return redirect('/')->with('message', [
                'type' => 'danger', 
                'text' => 'Neih!'
                ]);
        }

        return $next($request);
    }
}
