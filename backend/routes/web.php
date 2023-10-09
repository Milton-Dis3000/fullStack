<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/views/usuarios.php', 'UsuariosController@index')->name('usuarios');
Route::get('/views_controller/controller_dashboard.php', 'ControllerDashboardController@index')->name('controller_dashboard');
Route::get('/views_usuarios/user_profile.php', 'UserProfileController@index')->name('user_profile');