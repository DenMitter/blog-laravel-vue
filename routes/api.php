<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisterUserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [RegisterUserController::class, 'store']);
Route::post('login', [RegisterUserController::class, 'login']);

Route::middleware('auth:sanctum')->post('logout', [RegisterUserController::class, 'destroy']);
Route::middleware('auth:sanctum')->post('categories', [CategoryController::class, 'index']);
Route::middleware('auth:sanctum')->post('categories/create', [CategoryController::class, 'store']);
