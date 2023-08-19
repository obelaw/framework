<?php

use Illuminate\Support\Facades\Route;
use Obelaw\Framework\Livewire\Account\SettingsPage;
use Obelaw\Framework\Livewire\Auth\LoginPage;
use Obelaw\Framework\Modules\RoutesManagement;
use Obelaw\Framework\Pipeline\Locale\Http\Middleware\LocaleMiddleware;

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

Route::middleware(['web', 'obelawPermission', LocaleMiddleware::class])
    ->prefix($prefix)
    ->group(function () {
        Route::get('/login', LoginPage::class)->withoutMiddleware(['obelawPermission', LocaleMiddleware::class])->name('obelaw.admin.login');

        Route::get('/', function () {
            return view('obelaw::home', [
                'modules' => \Obelaw\Framework\Registrar::getListModules()
            ]);
        })->name('obelaw.home');

        Route::get('/account/settings', SettingsPage::class)->name('obelaw.account.settings');

        array_map(function ($routes) {
            require $routes;
        }, RoutesManagement::listRoutes());
    });
