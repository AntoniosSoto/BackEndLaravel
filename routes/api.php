<?php

use App\Http\Controllers\ContactoController;
use App\Http\Controllers\InfoContactoController;
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

Route::apiResource('contacto', ContactoController::class);
Route::apiResource('detalle', InfoContactoController::class);
