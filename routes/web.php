<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
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

Route::get('/home', [UserController::class, 'home']);
Route::get('/', [UserController::class, 'homeNot']);

Route::get('/register', function () {
    return view('register');
});

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [LoginController::class, 'store']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/payment', function () {
    return view('payment');
});

Route::post('/payment/{id}', [UserController::class, 'pay']);
Route::post('/wallet', [UserController::class, 'wallet']);


Route::post('/user/thumb', [RelationController::class, 'thumb'])->middleware('CheckUser');

