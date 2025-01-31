<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;

use App\Http\Controllers\Guest\BookingController;
use App\Http\Controllers\Guest\PaymentController;
use App\Http\Controllers\Guest\PesananController;

use App\Http\Controllers\Manager\CategoryController;
use App\Http\Controllers\Manager\KamarController;
use App\Http\Controllers\Manager\ManagerController;
use App\Http\Controllers\Manager\BookingTimeController;
use App\Http\Controllers\Manager\PesananDetailController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Guest
Route::get('/', function () {
    return view('guest.home');
})->name('guest.home');
     
Route::get('/about', function () {
    return view('guest.about');
})->name('guest.about');

Route::get('/service', function () {
    return view('guest.service');
})->name('guest.service');

Route::get('/room', function () {
    return view('guest.room');
})->name('guest.room');

Route::get('/book', function () {
    return view('guest.book');
})->name('guest.book');


Route::get('/checkout', [PaymentController::class, 'checkout'])->name('checkout');
Route::post('/payment', [PaymentController::class, 'processPayment'])->name('payment.process');
Route::post('/payment/notification', [PaymentController::class, 'handleNotification']);

Route::post('/payment', [PaymentController::class, 'createTransaction']);
// Route::post('/pesanan', [PesananController::class, 'store']);
Route::post('/pesanan', [PesananController::class, 'store'])->name('pesanan.store');
Route::post('/midtrans/callback', [PesananController::class, 'paymentCallback']);

Route::get('/search-rooms', [BookingController::class, 'search'])->name('search.rooms');
Route::post('/book-room', [BookingController::class, 'book'])->name('book.room');

Route::get('/booking-form/{room}', [BookingController::class, 'showBookingForm'])->name('booking.form');
Route::post('/booking-form/{room}/process', [BookingController::class, 'processBooking'])->name('booking.process');

// Guest end

// Admin
Route::group(['middleware' => ['isAdmin','auth'],'prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard.index');

    Route::resource('users', UserController::class);
    Route::delete('users_mass_destroy', [UserController::class, 'massDestroy'])->name('users.mass_destroy');
}); 

// Admin end

// Manager
Route::group(['middleware' => ['isManager','auth'],'prefix' => 'manager', 'as' => 'manager.'], function() {
    Route::get('dashboard', [ManagerController::class, 'index'])->name('dashboard.index');

    Route::resource('categories', CategoryController::class);
    Route::delete('categories_mass_destroy', [UserController::class, 'massDestroy'])->name('categories.mass_destroy');

    Route::resource('kamars', KamarController::class);
    Route::delete('kamars_mass_destroy', [KamarController::class, 'massDestroy'])->name('kamars.mass_destroy');

    Route::resource('Booking_Time', BookingTimeController::class)->except('show');
    Route::get('Booking_Time', [BookingTimeController::class, 'index'])->name('Booking_Time.index');
    Route::post('Booking_Time', [BookingTimeController::class, 'store'])->name('Booking_Time.store');
    Route::post('Booking_Time/reset', [BookingTimeController::class, 'reset'])->name('Booking_Time.reset');
    Route::post('Booking_Time/close-booking', [BookingTimeController::class, 'closeBooking'])->name('Booking_Time.close');
    Route::get('Booking_Time/available', [BookingTimeController::class, 'availableRooms'])->name('Booking_Time.available');

    Route::get('pesanan/detail-pesanan', [PesananDetailController::class, 'index'])->name('detail-pesanan.index');
    Route::post('pesanan/confirm/{pesanan_id}', [PesananDetailController::class, 'confirm'])->name('pesanan.confirm');


});

// Manager end

Auth::routes();
