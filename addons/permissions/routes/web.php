<?php

use Illuminate\Support\Facades\Route;
use Obelaw\Permissions\Http\Controllers\LogoutController;
use Obelaw\Permissions\Livewire\Auth\LoginPage;

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

Route::middleware('web')->prefix('obelaw')->group(function () {
    Route::get('/login', LoginPage::class)->name('obelaw.admin.login');
    Route::post('/logout', LogoutController::class)->name('obelaw.admin.logout');
});
