<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;

Route::get('/login', [LibroController::class,"login"])->name("login");
Route::post('/login', [LibroController::class,"loginPost"]);

Route::get('/logout', [LibroController::class,"logout"])->middleware("auth")->name("logout");

Route::get('/libro', [LibroController::class,"listar"]); //->middleware("auth");
Route::get('/libro/insertar', [LibroController::class,"agregar"])->middleware("auth");
Route::get('/libro/modificar/{id}', [LibroController::class,"modificar"])->middleware("auth");
Route::post('/libro/insertar', [LibroController::class,"agregarPost"])->middleware("auth");
Route::post('/libro/modificar/{id}', [LibroController::class,"modificarPost"])->middleware("auth");
