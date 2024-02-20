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

Route::get('/test', function () {
    return 'Juan Jesus, 2º DWES curso 23/24 Prueba';
});

Route::get('/api/user', function () {
    return "'No temo a los ordenadores; lo que temo es quedarme sin ellos'";
});

Route::get('user/{nombre}/{apellidos}', function ($nombre, $apellidos) {
    return "{$nombre} {$apellidos}";
});

Route::get('/user/{id?}', function ($id) {
    return "Hola {$id}";
});

Route::get('/user/show/{nobmre}/{id}', function ($nombre, $id) {
    return "Cliente {$nombre} y {$id}";    

});