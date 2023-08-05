<?php

namespace Obelaw\Framework\Pipeline\Locale\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;

class LocaleMiddleware
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
        $admin = auth()->guard('obelaw')->user();

        App::setLocale($admin->lang);

        View::share('dir', ($admin->lang == 'ar') ? 'rtl' : 'ltr');

        return $next($request);
    }
}
