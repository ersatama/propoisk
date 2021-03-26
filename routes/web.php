<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\RegisterController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\UserController;

Route::get('exit',[LoginController::class, 'logout'])->name('exit');

Route::group(['prefix' => 'admin'], function() {
    Route::get('phone_verify', [UserController::class, 'phoneVerify'])->name('phone.verify');
    Route::post('phone_verify', [UserController::class, 'checkPhoneCode'])->name('phone.code');
    Route::get('blocked_user', [UserController::class, 'blockedUser'])->name('user.blocked');
});

Route::prefix('admin')->group(function () {
    //Route::get('login', [LoginController::class, 'showLoginForm'])->name('backpack.auth.register');
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('backpack.auth.register');
    Route::post('register', [RegisterController::class, 'register'])->name('backpack.auth.register');
});

Route::get('/', function () {
    return view('welcome');
});


