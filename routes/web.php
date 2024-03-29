<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\Doctor\DoctorController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//User Routes
Route::prefix('user')->name("user.")->group(function () {
    Route::middleware(['guest:web', 'PreventBackHistory'])->group(function () {
        Route::view('/login', 'dashboard.user.login')->name('login');
        Route::view('/register', 'dashboard.user.register')->name('register');
        Route::post('/create', [UserController::class, 'create'])->name('create');
        Route::post('/check', [UserController::class, 'check'])->name('check');
    });
    Route::middleware(['auth:web', 'PreventBackHistory'])->group(function () {
        Route::view('/home', 'dashboard.user.home')->name('home');
        Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    });
});
//Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware(['guest:admin', 'PreventBackHistory'])->group(function () {
        Route::view('/login', 'dashboard.admin.login')->name('login');
        Route::post('/check', [AdminController::class, 'check'])->name('check');
    });
    Route::middleware(['auth:admin', 'PreventBackHistory'])->group(function () {
        Route::view('/home', 'dashboard.admin.home')->name('home');
        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
    });
});
//Doctor Routes
Route::prefix('doctor')->name("doctor.")->group(function () {
    Route::middleware(['guest:doctor', 'PreventBackHistory'])->group(function () {
        Route::view('/login', 'dashboard.doctor.login')->name('login');
        Route::view('/register', 'dashboard.doctor.register')->name('register');
        Route::post('/create', [DoctorController::class, 'create'])->name('create');
        Route::post('/check', [DoctorController::class, 'check'])->name('check');
    });
    Route::middleware(['auth:doctor', 'PreventBackHistory'])->group(function () {
        Route::view('/home', 'dashboard.doctor.home')->name('home');
        Route::post('/logout', [DoctorController::class, 'logout'])->name('logout');
    });
});
