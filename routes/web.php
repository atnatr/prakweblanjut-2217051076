<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/profile', [UserController::class, 'profile']);
Route::get('/profile/{nama}/{kelas}/{npm}', [UserController::class, 'profile']);
Route::post('/profile', [UserController::class, 'profile'])->name('profile.post');
Route::get('/user/create',[UserController::class,'create']);
Route::post('/user/store', [UserController::class, 'store']) -> name('user.store');
Route::get('/listUser', [UserController::class, 'index']);