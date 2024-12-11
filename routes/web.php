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
Route::post('/user/store', [UserController::class, 'store']) -> name('user.store');
Route::get('/listUser', [UserController::class, 'index'])->name('user.list');
Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');