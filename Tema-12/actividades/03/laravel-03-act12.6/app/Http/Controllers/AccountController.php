<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    // Mostrar todos los clientes
    public function index()
    {
        return 'Lista Cuentas';
    }

    // Crear un cliente
    public function create()
    {
        return 'Nueva Cuenta';
    }

    // Editar un cliente
    public function update($id)
    {
        return "Editar cuenta {$id}";
    }

    // Eliminar un cliente
    public function delete($id)
    {
        return "Eliminar cuenta {$id}";
    }

    // Mostrar un cliente
    public function show($id)
    {
        return "Cuenta: {$id}";
    }
}
