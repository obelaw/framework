<?php

use Illuminate\Support\Facades\Route;
use Obelaw\Framework\Pipeline\Locale\Http\Middleware\LocaleMiddleware;
use Obelaw\Framework\Livewire\Auth\LoginPage;
use Obelaw\Framework\Modules\RoutesManagement;

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

Route::get('/login', LoginPage::class)->withoutMiddleware(['obelawPermission', LocaleMiddleware::class])->name('obelaw.admin.login');

Route::get('/', function () {
    return view('obelaw::home', [
        'modules' => \Obelaw\Framework\Registrar::getListModules()
    ]);
})->name('obelaw.home');

foreach (RoutesManagement::listRoutes() as $id => $routes) {
    Route::middleware(['obelawIdentifier:' . $id])->group(function () use ($routes) {
        foreach ($routes as $route) {
            Route::get($route['uri'], $route['action'])->name($route['name']);
        }
    });
}
