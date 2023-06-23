<?php

use Illuminate\Support\Facades\Route;
use Store\Dashboard\Http\Livewire\Account\LoginPage;
use Store\Dashboard\Http\Livewire\Admin\Home as AdminHome;
use Store\Dashboard\Http\Livewire\Admin\Permissions\Admins\AdminCreate;
use Store\Dashboard\Http\Livewire\Admin\Permissions\Admins\AdminsIndex;
use Store\Dashboard\Http\Livewire\Admin\Permissions\Admins\AdminUpdate;
use Store\Dashboard\Http\Livewire\Home;
use Store\Dashboard\Http\Middleware\GlobalConfigMiddleware;

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


Route::prefix('o')->group(function () {
    Route::get('/', function () {
        return view('obelaw::layouts.dashboard');
    })->name('obelaw.home');
});
