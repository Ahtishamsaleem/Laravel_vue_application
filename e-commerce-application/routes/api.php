<?php

use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\UserController;
use App\Models\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// public routes
Route::post('/register',[UserController::class,'register']);
Route::post('/login',[UserController::class,'login']);
Route::post('/send_reset_password_email',[PasswordResetController::class,'send_reset_password_email']);
Route::post('/password_reset/{token}',[PasswordResetController::class,'reset']);

// protected routes

Route::middleware(['auth:sanctum'])->group(function(){
    Route::post('/logout',[UserController::class,'logout']);
    Route::get('/logged_user',[UserController::class,'logged_user']);
    Route::post('/changed_password',[UserController::class,'changed_password']);
});
