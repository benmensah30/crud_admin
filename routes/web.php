<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CountDownController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('ad_login');
});


Route::get('/admin/dashboard', [MainController::class, 'index']);
Route::get('/ad_login', [MainController::class, 'logout'])->name('ad_login');
Route::get('/create_user', [UserController::class, 'index'])->name('users.create_user');
Route::delete('/users/delete/{id}', [UserController::class, 'destroy'])->name('users.destroy');
Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit_user');
Route::get('/user_dashboard', [MainController::class, 'users_index'])->name('users.user_dashboard');
Route::get('/admin.index', [MainController::class, 'users_show'])->name('admin.index');
Route::get('/users', [MainController::class, 'profil'])->name('users.profil');
Route::get('/admin/ad_profil', [MainController::class, 'admin_profil'])->name('admin.ad_profil');


Route::post('/users/update/{id}', [UserController::class, 'update'])->name('users.update');
Route::post('/users/create_user', [UserController::class, 'store'])->name('users.store');
Route::post('/admin/dashboard', [AuthController::class, 'login'])->name('admin.dashboard');