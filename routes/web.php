<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/profile', [UserController::class, 'profile']);
Route::get('/user/profile/{id}', [UserController::class, 'profile'])->name('user.profile');
Route::get('/show/{id}', [UserController::class, 'show'])->name('user.show');
// Route::get('/profile/{nama}/{kelas}/{npm}/{foto}', [UserController::class, 'profile']);
Route::post('/profile', [UserController::class, 'profile'])->name('profile.post');
Route::get('/user/create',[UserController::class,'create'])->name('user.create');
Route::get('/profile/{nama}/{kelas}/{npm}', [UserController::class, 'profile']);
Route::post('/profile', [UserController::class, 'profile'])->name('profile.post');
Route::get('/user/create',[UserController::class,'create']);
Route::post('/user/store', [UserController::class, 'store']) -> name('user.store');
Route::get('/listUser', [UserController::class, 'index']);