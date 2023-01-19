<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerAccountController;
use App\Http\Controllers\OwnerAccountController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\BookController;
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
Route::post("customers", [CustomerAccountController::class, 'store']);
Route::post("owners", [CustomerAccountController::class, 'store']);




Route::middleware('auth:sanctum')->group(function () {
    // Route::apiResource('customer', CustomerAccountController::class);
    Route::get("customers", [CustomerAccountController::class, 'index']);
    Route::get("customers/{id}", [CustomerAccountController::class, 'show']);
    Route::put("customers/{id}", [CustomerAccountController::class, 'update']);
    Route::patch("customers/{id}", [CustomerAccountController::class, 'update']);
    Route::delete("customers/{id}", [CustomerAccountController::class, 'destroy']);

    // Route::apiResource('owner', OwnerAccountController::class);
    Route::get("owners", [OwnerAccountController::class, 'index']);
    Route::get("owners/{id}", [OwnerAccountController::class, 'show']);
    Route::put("owners/{id}", [OwnerAccountController::class, 'update']);
    Route::patch("owners/{id}", [OwnerAccountController::class, 'update']);
    Route::delete("owners/{id}", [OwnerAccountController::class, 'destroy']);

    Route::post('customers/logout', [AuthController::class, "logoutCustomerAcc"]);
    Route::post('owners/logout', [AuthController::class, "logoutOwnerAcc"]);

    Route::apiResource('places', PlaceController::class);
    Route::apiResource('books', BookController::class);

});

Route::post('customers/login', [AuthController::class, "loginCustomerAcc"]);
Route::post('owners/login', [AuthController::class, "loginOwnerAcc"]);



Route::middleware(['auth:sanctum', 'email_verified'])->get('/user', function (Request $request) {
    return $request->user();
});
