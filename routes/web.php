<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('auth.login');
});                                                         

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('manage-categories', [CategoryController::class, 'loadAllCategories'])->name('manage-categories');
    Route::get('add-category', [CategoryController::class, 'loadAddCategoryForm']);
    Route::post('add-category', [CategoryController::class, 'AddCategory'])->name('AddCategory');
    Route::get('edit-category/{id}', [CategoryController::class, 'loadEditForm']);
    Route::put('edit-category', [CategoryController::class, 'EditCategory'])->name('EditCategory');
    Route::get('delete-category/{id}', [CategoryController::class, 'DeleteCategory'])->name('categories.delete');
    Route::get('categories-search', [CategoryController::class, 'search'])->name('categories.search');

    Route::get('manage-user/{role}', [UserController::class, 'loadAllUsers'])->name('user');
    Route::get('manage-user-search/{role}', [UserController::class, 'search'])->name('users.search');
    Route::get('manage-users/{role}', [UserController::class, 'loadAllUsers']);
    Route::get('manage-user-add-{role}', [UserController::class, 'loadAddForm']);
    Route::post('manage-user-add-{role}', [UserController::class, 'AddUser'])->name('AddUser');
    Route::get('edit-manage-user/{id}/{role}', [UserController::class, 'loadEditForm'])->name('edit-user');
    Route::put('edit-manage-user/{id}/{role}', [UserController::class, 'EditUser'])->name('EditUser');
    Route::get('delete-manage-user/{id}/{role}', [UserController::class, 'deleteUser'])->name('user.delete');
    });

require __DIR__.'/auth.php';

Route::get('admin/dashboard', [HomeController::class, 'index'])->middleware(['auth','admin']);   