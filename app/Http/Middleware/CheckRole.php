<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
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
        if($request->user() === null)
        {
            return response()->json(['message' => "Insufficent Permission"]);
        }
        $actions = $request->route()[1];
        $roles = isset($actions['roles']) ? $actions['roles'] : null;
        if($request->user()->hasAnyRoles($roles))
        {
            return $next($request);
        }
        return response()->json(['message' => "Insufficent Permission"]);
       
    }
}
