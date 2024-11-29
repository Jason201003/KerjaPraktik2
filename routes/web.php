<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Manager\CategoryController;
use App\Http\Controllers\Manager\KamarController;
use App\Http\Controllers\Manager\ManagerController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('', function () {
    return view('auth.login');
});       
                                                      

Route::group(['middleware' => ['isAdmin','auth'],'prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard.index');

    Route::resource('users', UserController::class);
    Route::delete('users_mass_destroy', [UserController::class, 'massDestroy'])->name('users.mass_destroy');
    }); 

Route::group(['middleware' => ['isManager','auth'],'prefix' => 'manager', 'as' => 'manager.'], function() {
    Route::get('dashboard', [ManagerController::class, 'index'])->name('dashboard.index');

    // CRUD Categories
    Route::resource('categories', CategoryController::class);
    Route::delete('categories_mass_destroy', [UserController::class, 'massDestroy'])->name('categories.mass_destroy');

    // CRUD Kamars
    Route::resource('kamars', KamarController::class);
    Route::delete('kamars_mass_destroy', [KamarController::class, 'massDestroy'])->name('kamars.mass_destroy');
});

Auth::routes();
