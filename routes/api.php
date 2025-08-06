<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserlistController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::get('test', [TestController::class, 'list']);


// Route::get('users', [UserController::class, 'all']);
// Route::post('adduser', [UserController::class, 'adduser']);

Route::get ('userlist', [UserlistController::class, 'list']);