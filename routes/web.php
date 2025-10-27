<?php


Route::get('/', function () {
    return view('welcome');
});
>>>>>>> c42d8e3aec03eabb8be7f0cbebe206ea0257ae49
=======
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/about', [AboutController::class, 'index']);

Route::get('/notifications', [NotificationsController::class, 'index']);

Route::get('/profile', [ProfileController::class, 'index']);

Route::get('/signin', [AuthController::class, 'showSignin']);

Route::get('/register', [AuthController::class, 'showRegister']);
=======

Route::get('/', function () {
    return view('welcome');
});
>>>>>>> c42d8e3aec03eabb8be7f0cbebe206ea0257ae49
