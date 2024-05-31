<?php

use App\Http\Controllers\Auth\SocialController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Test\CheckController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('auth')->group(function () {
    Route::post('signup', [RegisterController::class, 'register'])->name('signup');

    Route::post('login', [LoginController::class, 'login'])->name('login');
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    // Route::post('password/token', [ResetPasswordController::class, 'sendResetToken'])->name('password.token');
    Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.reset');

    Route::controller(SocialController::class)->group(function ($router) {
        $router->pattern('provider', 'google');
        Route::get('{provider}', 'getProviderTargetUrl');
        Route::get('{provider}/callback', 'handleProviderCallback');
    });
});

Route::middleware('checkauth')->group(function () {
    Route::get('user',[CheckController::class,'info'])->name('testgetinfo');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    Route::middleware('checkadmin')->group(function () {
        Route::get('test/admin',[CheckController::class,'admin'])->name('testadmin');
    });
    Route::middleware('checkstaff')->group(function () {
        Route::get('test/staff',[CheckController::class,'staff'])->name('teststaff');
    });
});

