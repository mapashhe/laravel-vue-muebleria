<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\MuebleController;
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

/*  
    a veces se pone pendejo el laravel y no quieren funcionar 
    los metodos destroy/update, es por la ruta, solo cambiala
                    VVVV
*/
Route::resource("categorias", CategoriaController::class)->only(["store", "index", "show", "update", "destroy"]);
Route::resource("muebles", MuebleController::class)->only(["store", "index", "show", "update", "destroy"]);