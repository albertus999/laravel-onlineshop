<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// register
Route::post('/register', [App\Http\Controllers\Api\AuthController::class, 'register']);
//logout
Route::post('/logout', [App\Http\Controllers\Api\AuthController::class, 'logout'])->middleware('auth:sanctum');

//login
Route::post('/login', [App\Http\Controllers\Api\AuthController::class, 'login']);

//category
Route::get('/categories', [CategoryController::class, 'index']);

//product
Route::get('/products', [App\Http\Controllers\Api\ProductController::class, 'index']);

//address apiResource
Route::apiResource('addresses', App\Http\Controllers\Api\AddressController::class)->middleware('auth:sanctum');

//order
Route::post('/order', [App\Http\Controllers\Api\OrderController::class, 'order'])->middleware('auth:sanctum');

//callback
Route::post('/callback', [App\Http\Controllers\Api\CallbackController::class, 'callback']);

//check status order by id order
Route::get('/order/status/{id}', [App\Http\Controllers\Api\OrderController::class, 'checkStatusOrder'])->middleware('auth:sanctum');

// Route::get('/order/status/{id}', 'Api\OrderController@checkStatusOrder')->middleware('auth:sanctum');


//udpate fcm id
Route::post('/update-fcm', [App\Http\Controllers\Api\AuthController::class, 'updateFcmId'])->middleware('auth:sanctum');

//get order by user
Route::get('/orders', [App\Http\Controllers\Api\OrderController::class, 'getOrderByUser'])->middleware('auth:sanctum');

//get order by id
Route::get('/order/{id}', [App\Http\Controllers\Api\OrderController::class, 'getOrderById'])->middleware('auth:sanctum');

//update fcm id
Route::post('/update-fcm', [App\Http\Controllers\Api\AuthController::class, 'updateFcmId'])->middleware('auth:sanctum');

//delete address
Route::delete('/addresses/{id}', [App\Http\Controllers\Api\AddressController::class, 'destroy'])->middleware('auth:sanctum');

//get address by id
Route::get('/addresses/{id}', [App\Http\Controllers\Api\AddressController::class, 'show'])->middleware('auth:sanctum');

//edit address by id
Route::put('/addresses/{id}', [App\Http\Controllers\Api\AddressController::class, 'update'])->middleware('auth:sanctum');
