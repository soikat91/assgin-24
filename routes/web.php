<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ExpenseController;
use App\Http\Middleware\TokenVerificationMiddleware;

// auth route
Route::post('/user-registration',[UserController::class,'userRegistration']);
Route::post('/UserLogin',[UserController::class,'userLogin']);
Route::post('/sendOtpToEmail',[UserController::class,'sendOtpToEmail']);
Route::post('/otpVerify',[UserController::class,'otpVerify']);
Route::post('/setPassword',[UserController::class,'setPassword'])->middleware([TokenVerificationMiddleware::class]);

// profile route details
Route::get('/user-profile-details',[UserController::class,'getUser'])->middleware([TokenVerificationMiddleware::class]);
//profile update
Route::post('/profile-update',[UserController::class,'profileUpdate'])->middleware([TokenVerificationMiddleware::class]);

// pages
Route::get('/registration',[UserController::class,'registration']);
Route::get('/login',[UserController::class,'login']);
Route::get('/sendOtp',[UserController::class,'sendOtp']);
Route::get('/verifyOtp',[UserController::class,'verifyOtp']);
Route::get('/resetPassword',[UserController::class,'resetPassword'])->middleware([TokenVerificationMiddleware::class]);
// after authtication 
Route::get('/dashboard',[UserController::class,'dashboard'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/profile',[UserController::class,'profile'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/logout',[UserController::class,'userLogOut']);




// event route
Route::get('event-list',[EventController::class,'eventList'])->middleware([TokenVerificationMiddleware::class]);
Route::post('event-create',[EventController::class,'eventCreate'])->middleware([TokenVerificationMiddleware::class]);
Route::post('event-update',[EventController::class,'eventUpdate'])->middleware([TokenVerificationMiddleware::class]);
Route::post('event-delete',[EventController::class,'eventDelete'])->middleware([TokenVerificationMiddleware::class]);
Route::post('event-by-id',[EventController::class,'eventById'])->middleware([TokenVerificationMiddleware::class]);
Route::get('event-show',[EventController::class,'eventShow'])->middleware([TokenVerificationMiddleware::class]);


Route::get('total-event',[EventController::class,'totalEvent'])->middleware([TokenVerificationMiddleware::class]);


// page
Route::get('event',[EventController::class,'event'])->middleware([TokenVerificationMiddleware::class]);