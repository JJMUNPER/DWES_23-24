<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //Sólo un método
    public function __invoke(){

        $clientes = [
            [
                'id' => 1,
                'nombre' => 'Jota'
            ],
            [
                'id' => 2,
                'nombre' => 'Manolo'
            ],
            [
                'id' => 3,
                'nombre' => 'Ana'
            ]
            ];

        $usurios = [];

        $autor = 'Jota';
        $curso = '23/24';
        $modulo = 'DWES';
        $nivel = 2;
        return view('home.index', compact('autor', 'curso', 'modulo', 'nivel','clientes', 'usuarios'));
    }
}
