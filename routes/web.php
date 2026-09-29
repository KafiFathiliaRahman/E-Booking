<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\StudioController;


Route::get('/', [BookingController::class, 'dashboard'])->name('dashboard');


Route::resource('studios', StudioController::class);



Route::get('/bookings/create', [BookingController::class, 'create'])->name('bookings.create');
Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
Route::get('/bookings/{id}/payment', [BookingController::class, 'payment'])->name('bookings.payment');