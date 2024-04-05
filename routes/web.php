<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AdminOptionsController;
use App\Http\Controllers\WorkerReservationController;
use App\Models\Option;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/options', [AdminOptionsController::class, 'index'])->name('admin.options.index');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/worker/reservations', [WorkerReservationController::class, 'index'])->name('worker.reservations.index');
    Route::post('/worker/reservations/store', [WorkerReservationController::class, 'store'])->name('worker.reservations.store');
    Route::get('/worker/reservations/create', function () {
        $options = Option::all();
        return view('workerreservation.create', ['options' => $options]);
    })->name('worker.reservations.create');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
