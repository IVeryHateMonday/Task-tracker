<?php

use App\Http\Controllers\Task\IndexTaskController;
use App\Http\Controllers\Task\ShowTaskController;
use App\Http\Controllers\Task\StoreTaskController;
use App\Http\Controllers\User\LoginUserController;
use App\Http\Controllers\User\StoreUserController;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');

Route::prefix('user')->group(function () {
    Route::post('/register', StoreUserController::class)->name('user.register');
    Route::post('/login', LoginUserController::class)->name('user.login');

});
Route::prefix('v1')->middleware('auth:sanctum')->group(function () {
    Route::prefix('task')->group(function () {
        Route::get('/', IndexTaskController::class)->name('task.index');
        Route::get('/{task}', ShowTaskController::class)->name('task.show');
        Route::post('/', StoreTaskController::class)->name('task.store');
    });
});

