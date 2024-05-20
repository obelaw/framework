<?php

use Illuminate\Support\Facades\Route;
use Obelaw\Permissions\Livewire\Admins\CreateAdminComponent;
use Obelaw\Permissions\Livewire\Admins\IndexAdminsComponent;
use Obelaw\Permissions\Livewire\Admins\UpdateAdminComponent;
use Obelaw\Permissions\Livewire\HomeComponent;
use Obelaw\Permissions\Livewire\Rules\CreateRuleComponent;
use Obelaw\Permissions\Livewire\Rules\IndexRulesComponent;
use Obelaw\Permissions\Livewire\Rules\PermissionsRuleComponent;
use Obelaw\Permissions\Livewire\Rules\UpdateRuleComponent;

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

Route::prefix('permissions')->group(function () {
    Route::get('/', HomeComponent::class)->name('obelaw.permissions.home');

    Route::prefix('admins')->group(function () {
        Route::get('/', IndexAdminsComponent::class)->name('obelaw.permissions.admins.index');
        Route::get('/create', CreateAdminComponent::class)->name('obelaw.permissions.admins.create');
        Route::get('/{admin}/update', UpdateAdminComponent::class)->name('obelaw.permissions.admins.update');
    });

    Route::prefix('rules')->group(function () {
        Route::get('/', IndexRulesComponent::class)->name('obelaw.permissions.rules.index');
        Route::get('/create', CreateRuleComponent::class)->name('obelaw.permissions.rules.create');
        Route::get('/{rule}/update', UpdateRuleComponent::class)->name('obelaw.permissions.rules.update');
        Route::get('/{rule}/permissions', PermissionsRuleComponent::class)->name('obelaw.permissions.rules.permissions');
    });
});
