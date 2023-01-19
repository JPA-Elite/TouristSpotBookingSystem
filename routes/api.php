<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerAccountController;
use App\Http\Controllers\OwnerAccountController;
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
Route::post("customer", [CustomerAccountController::class, 'store']);
Route::post("owner", [CustomerAccountController::class, 'store']);

Route::middleware('auth:sanctum')->group(function () {
    // Route::apiResource('customer', CustomerAccountController::class);
    Route::get("customer", [CustomerAccountController::class, 'index']);
    Route::get("customer/{id}", [CustomerAccountController::class, 'show']);
    Route::put("customer/{id}", [CustomerAccountController::class, 'update']);
    Route::patch("customer/{id}", [CustomerAccountController::class, 'update']);
    Route::delete("customer/{id}", [CustomerAccountController::class, 'destroy']);

    // Route::apiResource('owner', OwnerAccountController::class);
    Route::get("owner", [OwnerAccountController::class, 'index']);
    Route::get("owner/{id}", [OwnerAccountController::class, 'show']);
    Route::put("owner/{id}", [OwnerAccountController::class, 'update']);
    Route::patch("owner/{id}", [OwnerAccountController::class, 'update']);
    Route::delete("owner/{id}", [OwnerAccountController::class, 'destroy']);

    Route::post('customer/logout', [AuthController::class, "logoutCustomerAcc"]);
    Route::post('owner/logout', [AuthController::class, "logoutOwnerAcc"]);

});

// Route::apiResource('place', PlaceController::class);
// Route::apiResource('book', BookController::class);
Route::middleware(['auth:sanctum', 'email_verified'])->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('customer/login', [AuthController::class, "loginCustomerAcc"]);
Route::post('owner/login', [AuthController::class, "loginOwnerAcc"]);
