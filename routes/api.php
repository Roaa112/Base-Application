<?php

use App\Modules\Developer\ProjectExportController;
use Illuminate\Http\Request;
use App\Modules\User\UserController;
use Illuminate\Support\Facades\Route;
use App\Modules\Developer\ProjectsController;
use App\Modules\Location\LocationController;


Route::prefix('user')->group(function () {  
    Route::post('register', [UserController::class, 'createUser']);
    Route::post('verify', [UserController::class, 'verify']);
    Route::post('login', [UserController::class, 'login']);

   
    Route::post('password/forgot', [UserController::class, 'sendResetOtp']);
    Route::post('password/verify-otp', [UserController::class, 'verifyOtp']);
    Route::post('password/reset', [UserController::class, 'resetPassword']);
    
});
Route::middleware('auth:sanctum')->post('logout', [UserController::class, 'logout']);


Route::controller(LocationController::class)->prefix('location')->group(function () {
    Route::get('city', 'listAllCites');
    Route::get('area', 'listAllAreas');
});


