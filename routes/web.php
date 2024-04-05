<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScoreController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OptionsController;

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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/auth.php';
