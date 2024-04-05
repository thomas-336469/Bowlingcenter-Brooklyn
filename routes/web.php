<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScoreController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/scores', [ScoreController::class, 'index'])->middleware(['auth', 'verified'])->name('scores');
Route::get('/addscore', [ScoreController::class, 'add'])->middleware(['auth', 'verified'])->name('addscore.index');
Route::post('/addscore', [ScoreController::class, 'store'])->middleware(['auth', 'verified'])->name('addscore.store');
Route::delete('/scores/{id}', [ScoreController::class, 'destroy'])->middleware(['auth', 'verified'])->name('scores.delete');
Route::get('/scores/{id}/edit', [ScoreController::class, 'edit'])->name('scores.edit');
Route::put('/scores/{id}/edit', [ScoreController::class, 'update'])->middleware(['auth', 'verified'])->name('scores.update');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
