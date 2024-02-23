<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articulos = [
        
            [
                'id' => 1,
                'descripcion'=>'Portátil HP MD12345',
                'modelo'=>'HP 15-1234-20',
                'categoria'=> 0,
                'unidades'=> 12,
                'precio'=> 550.50
            ],
            [
                'id' => 2,
                'descripcion'=>'Tablet - Samsung Galaxy Tab A (2019)',
                'modelo'=>'Exynos',
                'categoria'=> 5,
                'unidades'=> 200,
                'precio'=> 300
            ],
            [
                'id' => 3,
                'descripcion'=>'Impresora multifunción - HP',
                'modelo'=>'DeskJet 3762',
                'categoria'=> 4,
                'unidades'=> 2000,
                'precio'=> 69
            ],
            [
                'id' => 4,
                'descripcion'=>'TV LED 40" - Thomson 40FE5606 - Full HD',
                'modelo'=>'Thomson 40FE5606',
                'categoria'=> 3,
                'unidades'=> 300,
                'precio'=> 259
            ],
            [
                'id' => 5,
                'descripcion'=>'PC Sobremesa - Acer Aspire XC-830',
                'modelo'=>'Acer Aspire XC-830',
                'categoria'=> 1,
                'unidades'=> 20,
                'precio'=> 329
            ],
            [
                'id' => 6,
                'descripcion' => 'Smartwatch - Samsung Galaxy Watch 4',
                'modelo' => 'Galaxy Watch 4',
                'categoria' => 6,
                'unidades' => 50,
                'precio' => 349
            ],
            [
                'id' => 7,
                'descripcion' => 'Cámara DSLR - Canon EOS 90D',
                'modelo' => 'Canon EOS 90D',
                'categoria' => 7,
                'unidades' => 30,
                'precio' => 1199
            ],
            [
                'id' => 8,
                'descripcion' => 'Altavoz Bluetooth - JBL Flip 5',
                'modelo' => 'JBL Flip 5',
                'categoria' => 8,
                'unidades' => 150,
                'precio' => 119
            ],
            [
                'id' => 9,
                'descripcion' => 'Smartphone - iPhone 13 Pro Max',
                'modelo' => 'Apple A15 Bionic',
                'categoria' => 2,
                'unidades' => 100,
                'precio' => 1099
            ]
    
        ];

        return view('articulos.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
