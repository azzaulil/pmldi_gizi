<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\MakananController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/makanan', [ApiController::class, 'makananAll']);
Route::get('/makanan/{id}', [ApiController::class, 'nutrisiMakanan']);
Route::get('/user', [ApiController::class, 'userAll']);
Route::get('/user/{id}', [ApiController::class, 'userData']);
Route::get('/kantin', [ApiController::class, 'kantin']);
Route::get('/kantin/{id}', [ApiController::class, 'makananKantin']);
Route::get('/nutrisi', [ApiController::class, 'nutrisi']);


Route::post('/laporan', [LaporanController::class, 'store']);
