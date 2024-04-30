<?php

use Illuminate\Support\Facades\Route;
use Obelaw\Facades\Bundles;
use Obelaw\Framework\Facades\MiddlewareManager;
use Obelaw\Framework\Livewire\Account\SettingsPage;

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

$prefix = $prefix ?? 'obelaw';

Route::middleware(MiddlewareManager::getMiddlewares())
    ->prefix($prefix)
    ->group(function () {
        Route::get('/', config('obelaw.ui.containers.home_page'))->name('obelaw.home');

        Route::get('/account/settings', SettingsPage::class)->name('obelaw.account.settings');

        try {
            foreach (Bundles::getDashboardRoutes() as $id => $routes) {
                Route::middleware('obelawIdentifier:' . $id)
                    ->group($routes);
            }
        } catch (\Throwable $th) {
            if (!app()->runningInConsole()) {
                throw $th;
            }
        }
    });
