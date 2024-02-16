<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
Route::get('/', function () {
    return view('welcome');
});
// users routes
Route::resource('users', UserController::class);

// Other routes...

Route::resource('posts', PostController::class);