<?php

namespace App\Http\Middleware;

use Closure;

class CheckCandidate
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
        if ($request->session()->get('jobseeker_email') === null) {
          return redirect('/');
        }
        return $next($request);
    }
}
