<?php

// Controllers

use App\Http\Controllers\BraintreeController;
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\SponsorshipController;

// Facades
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('dashboard')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/reviews', [ReviewController::class, 'index']);
    Route::get('/messages', [MessageController::class, 'index']);
    Route::get('/statistics', [StatisticsController::class, 'index']);
    Route::resource('developer', DeveloperController::class);
    Route::get('/sponsorship', [SponsorshipController::class, 'index'])->name('sponsorship');
    Route::post('/payment', [SponsorshipController::class, 'newSponsorship'])->name('payment');
});


require __DIR__.'/auth.php';