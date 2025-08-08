<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserlistController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\UserAuthController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::get('test', [TestController::class, 'list']);



// API routes for user authentication
Route::post('login', [UserAuthController::class, 'login']);
Route::post('signup', [UserAuthController::class, 'signup']);
//Route::post('/logout', [UserAuthController::class, 'logout'])->middleware('auth:sanctum');




//Use middleware for authentication
Route::group (['middleware' => 'auth:sanctum'], function () {

    
//get all users data
Route::get ('userlist', [UserlistController::class, 'list']);

// add user
Route::post ('adduser', [UserlistController::class, 'adduser']);

// update user
Route::put ('updateuser', [UserlistController::class, 'updateuser']);

// delete user
Route::delete ('deleteuser/{id}', [UserlistController::class, 'deleteuser']);

// search user
Route::get ('searchuser/{firstname}', [UserlistController::class, 'searchApi']);

//resource route for user
Route::resource('users', MemberController::class);


});

Route::get('login', [UserAuthController::class, 'login'])->name('login');


