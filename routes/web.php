<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterUserController;
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

/*---------------------------------Sign In----------------------------------------------------*/
Route::get('/signin', [LoginController::class, 'create'])->name('signin');
Route::post('/signin', [LoginController::class, 'loginUser']);

/*---------------------------------Sign Up----------------------------------------------------*/
Route::get('/signup', [RegisterUserController::class, 'create'])->name('signup');
Route::post('/signup', [RegisterUserController::class, 'store']);

Route::view('home', 'welcome')->name('home');

