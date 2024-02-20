<?php

use Illuminate\Support\Facades\Route;
//Controller Account
use App\Http\Controllers\AccountController;

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

Route::controller(AccountController::class)->group(function () {
    Route::get('/cuentas', 'index')->name("cuentas.index");
    Route::get('/cuentas/create', 'create')->name("cuentas.create");
    Route::get('/cuentas/update/{id}', 'update')->name("cuentas.update");
    Route::get('/cuentas/show/{id}', 'show')->name("cuentas.show");
    Route::get('/cuentas/delete/{id}', 'delete')->name("cuentas.delete");
});