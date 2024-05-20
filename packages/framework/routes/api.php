<?php

use Illuminate\Support\Facades\Route;
use Obelaw\Facades\Bundles;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::prefix(config('obelaw.routes.api_prefix', 'obelaw/api'))
    ->group(function () {
        try {
            foreach (Bundles::getApiRoutes() as $id => $routes) {
                Route::middleware(['api'])->group($routes);
            }
        } catch (\Throwable $th) {
            if (!app()->runningInConsole()) {
                throw $th;
            }
        }
    });
