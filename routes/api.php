<?php

use App\Http\Controllers\ApplianceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaymentRecordController;
use App\Http\Controllers\ServiceRequestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  //  return $request->user();
//});

//Route::get('user',[AuthController::class, 'user']);
Route::post('register',[AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->get('user', [AuthController::class, 'user']);
Route::post('product', [ServiceRequestController::class, 'store']);
Route::get('product/{product}', [ServiceRequestController::class, 'show']);
// routes/api.php
Route::get('/appliances/{userId}', [ApplianceController::class, 'getUserAppliances']);
Route::post('/payments', [PaymentRecordController::class, 'store']);
