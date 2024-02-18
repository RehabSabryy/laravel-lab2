<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SocialController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// users routes
Route::resource('users', UserController::class);

//posts routes
Route::resource('posts', PostController::class);
// Route::get('/posts/{post}', [PostController::class, 'update'])->middleware('can:update,post');
// Route::delete('/posts/{post}', [PostController::class, 'destroy'])->middleware('can:delete,post');

Route::middleware(['auth'])->group(function () {
Route::resource('posts', PostController::class);
});
require __DIR__.'/auth.php';
