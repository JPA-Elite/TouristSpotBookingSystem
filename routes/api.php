<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerAccountController;
use App\Http\Controllers\OwnerAccountController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('customer', CustomerAccountController::class);
    Route::apiResource('owner', OwnerAccountController::class);

    Route::post('customer/logout', [AuthController::class, "logoutCustomerAcc"]);
    Route::post('owner/logout', [AuthController::class, "logoutOwnerAcc"]);

});

// Route::apiResource('place', PlaceController::class);
// Route::apiResource('book', BookController::class);
Route::middleware(['auth:sanctum', 'email_verified'])->get('/user',function (Request $request) {
    return $request->user();
});
Route::post('customer/login', [AuthController::class, "loginCustomerAcc"]);
Route::post('owner/login', [AuthController::class, "loginOwnerAcc"]);


