<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SesiController;

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/service', function () {
    return view('service');
})->name('service');

Route::get('/room', function () {
    return view('room');
})->name('room');

Route::get('/book', function () {
    return view('book');
})->name('book');

// Route untuk Booking Form tiap kamar
Route::get('/booking/superior', function () {
    return view('booking_form.booking_form_superior');
})->name('booking_form.booking_form_superior');

Route::get('/booking/superiorDouble', function () {
    return view('booking_form.booking_form_superior_double');
})->name('booking_form.booking_form_superior_double');

Route::get('/booking/superiorTwin', function () {
    return view('booking_form.booking_form_superior_twin');
})->name('booking_form.booking_form_superior_twin');

Route::get('/booking/deluxe', function () {
    return view('booking_form.booking_form_deluxe');
})->name('booking_form.booking_form_deluxe');

Route::get('/booking/deluxeDouble', function () {
    return view('booking_form.booking_form_deluxe_double');
})->name('booking_form.booking_form_deluxe_double');

Route::get('/booking/deluxeTwin', function () {
    return view('booking_form.booking_form_deluxe_twin');
})->name('booking_form.booking_form_deluxe_twin');
