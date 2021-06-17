<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ReceptionController;
use App\Http\Controllers\Api\RefrigeratorController;
use App\Http\Controllers\Api\StoreController;
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

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/
Route::get('reception', [ReceptionController::class, 'index']);
Route::get('reception/show/{id}', [ReceptionController::class, 'show']);
Route::get('refrigerator/show', [RefrigeratorController::class, 'show']);
Route::delete('refrigerator/destroy/{id}', [RefrigeratorController::class, 'destroy']);
Route::delete('refrigerator/destroy_all', [RefrigeratorController::class, 'destroy_all']);
Route::get('refrigerator/destroy_all', [RefrigeratorController::class, 'destroy_all']);
Route::get('store/show/{id}', [StoreController::class, 'show']);
