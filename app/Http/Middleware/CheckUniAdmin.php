<?php

namespace App\Http\Middleware;

use Closure;

class CheckUniAdmin
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
        $user = $request->user();

        if ($user->university != 'FPT') {
            return abort(403, 'Khong co quyen do khong thuoc FPT');
        }

        return $next($request);
    }
}
