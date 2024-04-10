<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AdminOptionsController;
use App\Http\Controllers\ReservationController;
use Illuminate\Routing\Middleware;
use App\Http\Controllers\UserReservationController;
use App\Http\Controllers\WorkerReservationController;
use App\Http\Controllers\BaanReservationController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/admin/options', [AdminOptionsController::class, 'index'])->name('admin.options.index');

Route::middleware('auth')->group(function () {
    Route::get('/reservations', [UserReservationController::class, 'index'])->name('reservations.index');
    Route::get('/reservations/create', [UserReservationController::class, 'create'])->name('reservations.create');
    Route::get('/reservations/$reservation/{id}/edit', [UserReservationController::class, 'edit'])->name('reservations.edit');
    Route::patch('/reservations/$reservation/{id}update', [UserReservationController::class, 'update'])->name('reservations.update');
    Route::delete('/reservations/$reservation/{id}/delete', [UserReservationController::class, 'destroy'])->name('reservations.destroy');
    Route::post('/reservations/store', [UserReservationController::class, 'store'])->name('reservations.store');
    Route::get('/mazinReservation', [ReservationController::class, 'index'])->name('Reservation.index');
    Route::get('/baanReservation', [BaanReservationController::class, 'index'])->name('baanReservation.index');

    Route::get('/baanReservation/{id}/edit', [BaanReservationController::class, 'edit'])->name('baanReservation.edit');


    Route::patch('/baanReservation/{id}/update', [BaanReservationController::class, 'update'])->name('baanReservation.update');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
