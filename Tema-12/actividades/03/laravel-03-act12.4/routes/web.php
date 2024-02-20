<?php


use Illuminate\Support\Facades\Route;
//Clientes Controller
use App\Http\Controllers\ClientesController;
//Productos Controller
use App\Http\Controllers\ProductoController;

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

//Vinculamos las rutas
Route::get('/clientes', [ClientesController::class, 'index']);
Route::get('/clientes/create', [ClientesController::class, 'create']);
Route::get('/clientes/show/{id}', [ClientesController::class, 'show']);
Route::get('/clientes/delete/{id}', [ClientesController::class, 'delete']);
Route::get('/clientes/update/{id}', [ClientesController::class, 'update']);

// Rutas de ProductoController creado con --resource
Route::get('productos', ProductoController::class);