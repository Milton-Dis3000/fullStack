<?php

use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\EnlaceController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
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



Route::controller(UsuarioController::class)->group(function (){
    Route::get('/usuarios', 'index');
    Route::get('/usuarios/{id}', 'show'); 
    Route::post('/usuarios', 'store');
    Route::put('/usuarios/{id}', 'update');
    Route::delete('/usuarios/{id}', 'destroy');
    // Route::post('/usuarios/{id_persona}/personas', 'persona');

});


Route::controller(RolController::class)->group(function (){
    Route::get('/rols', 'index');
    Route::get('/rols/{id}', 'show'); 
    Route::post('/rols', 'store');
    Route::put('/rols/{id}', 'update');
    Route::delete('/rols/{id}', 'destroy');

});


Route::controller(EnlaceController::class)->group(function (){
    Route::get('/enlaces', 'index');
    Route::get('/enlaces/{id}', 'show'); 
    Route::post('/enlaces', 'store');
    Route::put('/enlaces/{id}', 'update');
    Route::delete('/enlaces/{id}', 'destroy');
    // Route::post('/enlaces/{id_pagina}/paginas', 'pagina');


});

Route::controller(PersonaController::class)->group(function (){
    Route::get('/personas', 'index');
    Route::get('/personas/{id}', 'show'); 
    Route::post('/personas', 'store');
    Route::put('/personas/{id}', 'update');
    Route::delete('/personas/{id}', 'destroy');

});



Route::get('/bitacoras', [BitacoraController::class, 'index']);



// Route::get('/enlaces', [RolController::class, 'index']);
