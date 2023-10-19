<?php

use App\Http\Controllers\Api\DeveloperController;
use App\Http\Controllers\Api\MessageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::name('api.')->group(function () {
    Route::get('work-fields', [DeveloperController::class, 'work_fields']);
    Route::get('votes', [DeveloperController::class, 'votes']);
    Route::get('developers/{search}-{vote?}-{review?}', [DeveloperController::class, 'search']);
    Route::get('developer/{id}', [DeveloperController::class, 'show']);
    Route::post('message', [MessageController::class, 'send']);
});