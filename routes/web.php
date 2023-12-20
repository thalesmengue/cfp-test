<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

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

Route::get('/login', [AuthController::class, 'index'])->name('auth.index');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

Route::get('/register', [AuthController::class, 'create'])->name('auth.create');
Route::post('/register', [AuthController::class, 'store'])->name('auth.register');

Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
