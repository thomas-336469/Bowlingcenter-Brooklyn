<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AdminOptionsController;
use Illuminate\Routing\Middleware;
use App\Http\Controllers\UserReservationController;

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
    Route::post('/reservations/store', [UserReservationController::class, 'store'])->name('reservations.store');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
