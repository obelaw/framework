<?php

namespace Obelaw\Framework\ACL\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PermissionMiddleware
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
        abort_if(!auth()->guard('obelaw')->check(), redirect(route('obelaw.admin.login')));
        abort_if(!auth()->guard('obelaw')->user()->rule, 401);

        return $next($request);
    }
}
