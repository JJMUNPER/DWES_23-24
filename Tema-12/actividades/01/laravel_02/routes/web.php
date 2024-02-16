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
    return "Hola mundo laravel 10";
    //return view('welcome');
});

Route::get('/client', function () {
    return "Vista principal de clientes";
    //return view('welcome');
});

// Route::get('/client/delete/{id}', function ($id) {
//     return "Eliminar cliente: {$id}";

// });

Route::get('/client/edit/{id}', function ($id) {
    return "Editar cliente: {$id}";

});

Route::get('/client/show/{id}', function ($id) {
    return "Mostrar cliente: {$id}";

});

Route::get('/client/new', function () {
    return "Nuevo cliente";

});
// Sin simblo de interrogracion los parametros son obligatorios
// Route::get('/client/delete/{id1}/{id2}', function ($id1, $id2) {
//     return "Eliminar cliente: {$id1} a {$id2}";

// });

//De esta forma se convierte en opcionales
Route::get('/client/delete/{id1}/{id2?}', function ($id1, $id2=null) {
    if(!$id2){
        return "Eliminar cliente: {$id1}";
    } else {
        return "Eliminar clientes desde {$id1} a {$id2}";
    }
    

});