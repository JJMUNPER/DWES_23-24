<?php

/*
    funcion: busca_en_tabla()
    descripción: busca un elemento de la tabla
    parámetros:
                -tabla
                -nombre de la columna
                -valor que quiero buscar
    salida:     
                -índice del array donde se encuentra el valor
                -false en caso de que no lo encuentre
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
        'Móviles',
        'Fotografía',
        'Imagen'
    ];

    return $categorias;
}


function generar_tabla()
{

    $tabla = [
        [
            'id' => 1,
            'descripcion' => 'Portatil Lenovo',
            'modelo' => 'Xjh 44',
            'categoria' => 0,
            'unidades' => '5',
            'precio' => '680'
        ],
        [
            'id' => 2,
            'descripcion' => 'Portatil AMD',
            'modelo' => 'HP 255 G7',
            'categoria' => 0,
            'unidades' => '213',
            'precio' => '920'
        ],
        [
            'id' => 3,
            'descripcion' => 'Pc Sobremesa Lenovo Intel i5',
            'modelo' => 'ideacentre 51OS-007',
            'categoria' => 1,
            'unidades' => '340',
            'precio' => '590.76'
        ],
        [
            'id' => 4,
            'descripcion' => 'Pc Sobremesa Asus i9',
            'modelo' => 'TUF Revolunt G10',
            'categoria' => 1,
            'unidades' => '223',
            'precio' => '910.89'
        ],
        [
            'id' => 5,
            'descripcion' => 'Fuente de alimentacion',
            'modelo' => 'Tancens XR 750W',
            'categoria' => 2,
            'unidades' => '100',
            'precio' => '60.99'
        ],
        [
            'id' => 6,
            'descripcion' => 'Pantalla LG 4k Full HD 27"',
            'modelo' => 'ambs553',
            'categoria' => 3,
            'unidades' => '100',
            'precio' => '60'
        ],
        [
            'id' => 7,
            'descripcion' => 'Impresora HP',
            'modelo' => 'TRR 890',
            'categoria' => 4,
            'unidades' => '20',
            'precio' => '140'
        ]

    ];


    return $tabla;
}


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


// /** eliminar() - eliminar artículo de la tabla */
// function eliminar($tabla = [], $indice)
// {

//     #Elimina la tabla
//     unset($tabla[$indice]);
//     #Genera el array actualizado
//     $tabla = array_values($tabla);
//     return $tabla;

// }


// /** actualizar() - actualizar los valores del artículo en la tabla */
// function actualizar($tabla = [], $valores, $indice)
// {

//     $tabla[$indice] = $valores;

//     return $tabla;

// }


// /** nuevo() - añadir nuevo artículo en la tabla */
// function nuevo($tabla, $valores)
// {

//     //$tabla[]=registro;
//     array_push($tabla, $valores);
//     return $tabla;

// }


// /** ordenar() - ordenará la tabla por distintos criterios*/
// function ordenar($tabla, $criterio)
// {

//     $aux = array_column($tabla, $criterio);

//     array_multisort($aux, SORT_ASC, $tabla);
//     return $tabla;

// }


// /** ultimoId() - devolverá el último id de la tabla*/
// function ultimoId($tabla)
// {

//     return end($tabla)['id'];
// }

// function filtrar($tabla, $criterio)
// {
//     $aux = [];
//     $categorias=generar_tabla_categorias();

//     foreach ($tabla as $registro) {

//         if (in_array($criterio, $registro)) {
//             array_push($aux, $registro);
//         }
//     }

//     if (empty($aux)) {
//         $aux = $tabla;
//     }

//     return $aux;
// }


?>