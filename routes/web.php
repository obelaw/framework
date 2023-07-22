<?php

use Illuminate\Support\Facades\Route;
use Obelaw\Framework\Livewire\Auth\LoginPage;

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

Route::get('/login', LoginPage::class)->withoutMiddleware('obelawPermission')->name('obelaw.admin.login');

Route::get('/', function () {
    return view('obelaw::home', [
        'modules' => \Obelaw\Framework\Registrar::getListModules()
    ]);
})->name('obelaw.home');
