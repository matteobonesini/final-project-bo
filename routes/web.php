<?php

// Controllers
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MessageController;

// Facades
use Illuminate\Support\Facades\Route;

/*
YURI
*/

/*
LORENZO
*/
Route::get('/message', [MessageController::class, 'index'])->name('message.index');

Route::get('/', function () {
    return view('dashboard.dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('dashboard')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/reviews', [ReviewController::class, 'index']);
    Route::get('/messages', [MessageController::class, 'index']);
    Route::resource('developer', DeveloperController::class);
});

require __DIR__.'/auth.php';