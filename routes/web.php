<?php

use App\Http\Controllers\Task\ShowTaskController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Task\IndexTaskController;
use App\Http\Controllers\User\StoreUserController;

Route::get('/', function () {
    return view('welcome');
});


