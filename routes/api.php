<?php

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

Route::get('/book/search',  [App\Http\Controllers\BookController::class, 'search']);
Route::get('/book', [App\Http\Controllers\BookController::class, 'index']);
Route::post('/book', [App\Http\Controllers\BookController::class, 'store']);
Route::get('/book/{book:uuid}', [App\Http\Controllers\BookController::class, 'get']);
