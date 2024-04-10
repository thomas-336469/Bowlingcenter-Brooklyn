<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScoreController;
use App\Models\User;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OptionsController;
use App\Http\Controllers\WorkerReservationController;
use App\Models\Option;
use App\Models\Reservation;
use App\Models\WorkerReservation;
use App\Models\Alley;
use Illuminate\Routing\Middleware;
use App\Http\Controllers\UserReservationController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// view route
Route::get('/admin/options', [OptionsController::class, 'index'])->name('admin.options.index');

// edit route
Route::get('/admin/options/{id}/edit', [OptionsController::class, 'edit'])->name('admin.options.edit');
Route::put('/admin/options/{id}', [OptionsController::class, 'update'])->name('admin.options.update');
// delete route
Route::get('/admin/options/{id}/delete', [OptionsController::class, 'delete'])->name('admin.options.delete');
Route::delete('/admin/options/{id}', [OptionsController::class, 'destroy'])->name('admin.options.destroy');
// create route
Route::get('/admin/options/create', [OptionsController::class, 'create'])->name('admin.options.create');
Route::post('/admin/options', [OptionsController::class, 'store'])->name('admin.options.store');

Route::get('/scores', [ScoreController::class, 'index'])->middleware(['auth', 'verified'])->name('scores');
Route::get('/addscore', [ScoreController::class, 'add'])->middleware(['auth', 'verified'])->name('addscore.index');
Route::post('/addscore', [ScoreController::class, 'store'])->middleware(['auth', 'verified'])->name('addscore.store');
Route::delete('/scores/{id}', [ScoreController::class, 'destroy'])->middleware(['auth', 'verified'])->name('scores.delete');
Route::get('/scores/{id}/edit', [ScoreController::class, 'edit'])->name('scores.edit');
Route::put('/scores/{id}/edit', [ScoreController::class, 'update'])->middleware(['auth', 'verified'])->name('scores.update');

Route::group(['middleware' => ['auth']], function () {
    Route::delete('/worker/reservations/{reservation}/delete', [WorkerReservationController::class, 'delete'])->name('worker.reservations.delete');
    Route::get('/worker/reservations', [WorkerReservationController::class, 'index'])->name('worker.reservations.index');
    Route::post('/worker/reservations/store', [WorkerReservationController::class, 'store'])->name('worker.reservations.store');
    Route::get('/worker/reservations/create', function () {
        $options = Option::all();
        return view('workerreservation.create', ['options' => $options]);
    })->name('worker.reservations.create');
    Route::get('/worker/reservations/{reservation}/update', function () {
        $reservation = WorkerReservation::find(request()->reservation);
        $options = Option::all();
        return view('workerreservation.update', ['reservation' => $reservation, 'options' => $options]);
    })->name('worker.reservations.update');
    Route::post('/worker/reservations/{reservation}/update', [WorkerReservationController::class, 'update'])->name('worker.reservations.update');
});

Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations');
Route::get('/reservations/filter', [ReservationController::class, 'filter'])->name('reservations.filter');
Route::get('/reservations/{reservation}/update', function () {
    $reservation = Reservation::find(request()->reservation);
    $alleys = Alley::all();
    return view('reservation.update', ['reservation' => $reservation, 'alleys' => $alleys]);
})->name('reservations.update');
Route::post('/reservations/{reservation}/update', [ReservationController::class, 'update'])->name('reservations.update');

Route::middleware('auth')->group(function () {
    Route::get('/reservations', [UserReservationController::class, 'index'])->name('reservations.index');
    Route::get('/reservations/create', [UserReservationController::class, 'create'])->name('reservations.create');
    Route::get('/reservations/$reservation/{id}/edit', [UserReservationController::class, 'edit'])->name('reservations.edit');
    Route::patch('/reservations/$reservation/{id}update', [UserReservationController::class, 'update'])->name('reservations.update');
    Route::delete('/reservations/$reservation/{id}/delete', [UserReservationController::class, 'destroy'])->name('reservations.destroy');
    Route::post('/reservations/store', [UserReservationController::class, 'store'])->name('reservations.store');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/auth.php';
