<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;


Route::get('/libro', [LibroController::class,"listar"]);
Route::get('/libro/insertar', [LibroController::class,"agregar"]);
Route::get('/libro/modificar/{id}', [LibroController::class,"modificar"]);
Route::post('/libro/insertar', [LibroController::class,"agregarPost"]);
Route::post('/libro/modificar/{id}', [LibroController::class,"modificarPost"]);
