<?php

/*
 *  
 * 
*/

function buscar_en_tabla($tabla = [], $columna, $valor)
{

    $columna_valores = array_column($tabla, $columna);
    return array_search($valor, $columna_valores, false);

}

/*Generar la tabla categorías */

function generar_tabla_categorias()
{
    $categorias = [
        'Portátiles',
        'PCs Sobremesa',
        'Componentes',
        'Pantallas',
        'Impresoras',
        'Tablets',
        'Moviles',
        'Imagen'
    ];

    asort($categorias);

    return $categorias;
}

function generar_tabla_marcas(){

    $marcas = [
        'Accer',
        'Asus',
        'Apple',
        'IBM',
        'Xiaomi',
        'Aoc',
        'Intel'
    ];

    asort($marcas);
    return $marcas;

}


function generar_tabla()
{

    $tabla = [
        [
            'id' => 1,
            'descripcion' => 'Portatil Lenovo',
            'modelo' => 'Xjh 44',
            'marca' => 0,
            'unidades' => '5',
            'precio' => '680'
        ],
        [
            'id' => 2,
            'descripcion' => 'Portatil AMD',
            'modelo' => 'HP 255 G7',
            'marca' => 0,
            'unidades' => '213',
            'precio' => '920'
        ],
        [
            'id' => 3,
            'descripcion' => 'Pc Sobremesa Lenovo Intel i5',
            'modelo' => 'ideacentre 51OS-007',
            'marca' => 1,
            'unidades' => '340',
            'precio' => '590.76'
        ],
        [
            'id' => 4,
            'descripcion' => 'Pc Sobremesa Asus i9',
            'modelo' => 'TUF Revolunt G10',
            'marca' => 1,
            'unidades' => '223',
            'precio' => '910.89'
        ],
        [
            'id' => 5,
            'descripcion' => 'Fuente de alimentacion',
            'modelo' => 'Tancens XR 750W',
            'marca' => 2,
            'unidades' => '100',
            'precio' => '60.99'
        ],
        [
            'id' => 6,
            'descripcion' => 'Pantalla LG 4k Full HD 27"',
            'modelo' => 'ambs553',
            'marca' => 3,
            'unidades' => '100',
            'precio' => '60'
        ],
        [
            'id' => 7,
            'descripcion' => 'Impresora HP',
            'modelo' => 'TRR 890',
            'marca' => 4,
            'unidades' => '20',
            'precio' => '140'
        ]

    ];


    return $tabla;
}

/** nuevo() - añadir nuevo artículo en la tabla */
function nuevo($tabla, $registro)
{

    $tabla[] = $registro;
    return $tabla;

}


function siguienteID($tabla)
{ {
        $ultimoID = 0;

        foreach ($tabla as $articulo) {
            if (isset($articulo['id']) && $articulo['id'] > $ultimoID) {
                $ultimoID = $articulo['id'];
            }
        }

        return $ultimoID + 1;
    }
}

/** eliminar() - eliminar artículo de la tabla */
function eliminar($tabla = [], $indice)
{

    #Elimina la tabla
    unset($tabla[$indice]);
    #Genera el array actualizado
    $tabla = array_values($tabla);
    return $tabla;

}


/** actualizar() - actualizar los valores del artículo en la tabla */
function actualizar($tabla = [], $valores, $indice)
{

    $tabla[$indice] = $valores;

    return $tabla;

}



/** ordenar() - ordenará la tabla por distintos criterios*/
function ordenar($tabla, $criterio)
{

    $aux = array_column($tabla, $criterio);

    array_multisort($aux, SORT_ASC, $tabla);
    return $tabla;

}


/** ultimoId() - devolverá el último id de la tabla*/
function ultimoId($tabla)
{

    return end($tabla)['id'];
}


?>