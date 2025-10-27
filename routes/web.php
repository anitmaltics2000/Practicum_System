<?php

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

Route::post('/register', [AuthController::class, 'register']);

Route::post('/signin', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout']);
