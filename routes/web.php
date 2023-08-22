<?php

use Illuminate\Support\Facades\Route;
use Obelaw\Framework\Facades\Bundles;
use Obelaw\Framework\Livewire\Account\SettingsPage;
use Obelaw\Framework\Livewire\Auth\LoginPage;
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
                'modules' => array_values(Bundles::getModules())
            ]);
        })->name('obelaw.home');

        Route::get('/account/settings', SettingsPage::class)->name('obelaw.account.settings');

        try {
            foreach (Bundles::getRoutes() as $id => $routes) {
                Route::middleware('obelawIdentifier:' . $id)
                    ->group($routes);
            }
        } catch (\Throwable $th) {
            if (!app()->runningInConsole()) {
                throw $th;
            }
        }
    });
