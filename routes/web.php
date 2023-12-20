<?php

use Illuminate\Support\Facades\Route;
use Obelaw\Facades\Bundles;
use Obelaw\Framework\Livewire\Account\SettingsPage;
use Obelaw\Framework\Livewire\Auth\LoginPage;
use Obelaw\Framework\Livewire\Auth\LogoutController;
use Obelaw\Framework\Pipeline\Locale\Http\Middleware\LocaleMiddleware;
use Obelaw\UI\Views\Containers\HomePageContainer;

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
        Route::post('/logout', LogoutController::class)->withoutMiddleware(['obelawPermission', LocaleMiddleware::class])->name('obelaw.admin.logout');

        Route::get('/', HomePageContainer::class)->name('obelaw.home');

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
