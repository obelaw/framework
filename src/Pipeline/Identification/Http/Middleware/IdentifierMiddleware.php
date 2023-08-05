<?php

namespace Obelaw\Framework\Pipeline\Identification\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Obelaw\Framework\Pipeline\Identification\Identifier;
use Obelaw\Framework\Registrar;

class IdentifierMiddleware

{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $id)
    {
        $modules = Registrar::getModules();

        if ($modules[$id]) {

            $module = array_merge(['id' => $id], $modules[$id]['info']);

            View::share('_module',  $module);

            Identifier::setModule($module);
        }

        return $next($request);
    }
}
