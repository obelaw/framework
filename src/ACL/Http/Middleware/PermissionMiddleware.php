<?php

namespace Obelaw\Framework\ACL\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Obelaw\Framework\ACL\Permission;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $permission = false)
    {
        abort_if(!auth()->guard('obelaw')->check(), redirect(route('obelaw.admin.login')));

        if (Permission::verify($permission)) {
            return $next($request);
        }
    }
}
