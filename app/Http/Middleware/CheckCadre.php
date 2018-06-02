<?php

namespace mfgs\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use mfgs\User;

class CheckCadre
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
        $response = $next($request);
        return $request->user()->droit->cadre ? $response : redirect()->route('home',$request->user()->droit->libelle);
    }
}
