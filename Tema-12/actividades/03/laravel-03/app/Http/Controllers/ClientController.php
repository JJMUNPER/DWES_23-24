<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    //Mostrar todos los clientes
    public function index(){
        return "Lista Clientes";
    }

    public function create(){
        return "Nuevo Cliente";
    }

    public function show($id){
        return "Mostrar Cliente: {$id}";
    }

    public function edit($id){
        return "Editar Cliente: {$id}";
    }
}
