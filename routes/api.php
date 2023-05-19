<?php

use App\Http\Controllers\ClubeController;
use App\Http\Controllers\RecursoController;
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

Route::get('/clube', [ClubeController::class, 'index']);
Route::get('/clube/{id}', [ClubeController::class, 'show']);
Route::post('/clube/consumo', [ClubeController::class, 'update']);
Route::post('/clube', [ClubeController::class, 'store']);

Route::get('/recurso', [RecursoController::class, 'index']);
Route::get('/recurso/{id}', [RecursoController::class, 'show']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
