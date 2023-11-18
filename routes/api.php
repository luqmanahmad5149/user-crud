<?php

use App\Http\Controllers\Api\V1\UserController;
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

// api/v1
Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1'], function() {
    Route::get('/users', [UserController::class, 'getUsers']);
    Route::get('/user', [UserController::class, 'getUser']);
    Route::post('/user', [UserController::class, 'postUser']);
    Route::put('/user/update', [UserController::class, 'putUser']);
    Route::delete('/user/delete', [UserController::class, 'deleteUser']);
});
