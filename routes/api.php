<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrokersController;
use App\Http\Controllers\PropertiesController;
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

//public routes
Route::post('/login' , [AuthController::class , 'login']);
Route::post('/register' , [AuthController::class , 'register']);
Route::apiResource('/brokers' , BrokersController::class)->only(['index' , 'show']);
Route::apiResource('/properties' , PropertiesController::class);

//private routes

Route::middleware('auth:sanctum')->group(function (){
    Route::apiResource('/brokers' , BrokersController::class)
        ->only(['store' , 'update', 'destroy']);
    Route::delete('/logout' , [AuthController::class , 'logout']);

});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
