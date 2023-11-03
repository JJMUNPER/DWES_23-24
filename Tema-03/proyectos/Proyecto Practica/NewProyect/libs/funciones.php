<?php

function getGeneros(){

    $generos = [

        "Acción",
            "Aventura",
            "Comedia",
            "Musical",
            "Terror",
            "Bélica",
            "Dramático",
            "Suspense",
            "Histórico",
            "Fantasía"
    ];

    return $generos;
}

function getPeliculas(){

    $peliculas = [

        [ 
            "id" => 1,
            "titulo" => "Joker",
            "director" => "Todd Phillips",
            "nacionalidad" => "Estados Unidos",
            "generos" => [6, 7],
            "año" => 2019
            
          ],
    [ 
            "id" => 2,
            "titulo" => "Mientras dure la guerra",
            "director" => "Alejandro Amenábar",
            "nacionalidad" => "España",
            "generos" => [6, 8],
            "año" => 2019
      ],
          [ 
            "id" => 3,
            "titulo" => "Terminator.Destino oscuro",
            "director" => "Tim Miller",
            "nacionalidad" => "Estados Unidos",
            "generos" => [0, 9],
            "año" => 2019
           
          ],
          [ 
            "id" => 4,
            "titulo" => "La vida es bella",
            "director" => "Roberto Benini",
            "nacionalidad" => "Italia",
            "generos" => [3, 5, 6],
            "año" => 1997
            
          ],
          [ 
              "id" => 5,
              "titulo" => "Interstellar",
              "director" => "Christopher Nolan",
              "nacionalidad" => "Estados Unidos",
              "generos" => [1, 6, 7],
              "año" => 2014
              
            ]
    ];

    return $peliculas;
}

function eliminar ($peliculas, $indice){
    
    unset($peliculas[$indice]);
    $peliculas = array_values($peliculas);
    return $peliculas;
}

function nuevo ($peliculas, $registro){

    $peliculas[]=$registro;
    return $peliculas;
}

function actualizar($peliculas, $registro, $indice){ 
    $peliculas[$indice] = $registro;
    return $peliculas;
}

function ordenar($peliculas, $campo){

    $aux = array_column($peliculas, $campo);
    array_multisort($aux, SORT_ASC, $peliculas); 
    return $peliculas;
}

function filtrar($peliculas, $expresion){
       
    $aux = []; 

    foreach($peliculas as $registro){ 
        if(in_array($expresion, $registro)){       
            $aux[] = $registro; 
        }
    }
    return (empty($aux)? $peliculas: $aux);
}

function nuevo_id($peliculas){
    $ultimo_id = count($peliculas) + 1;  
    return $ultimo_id;
}

function listaGeneros($generos, $indiceGeneros){
    $aux = [];
    foreach ($indiceGeneros as $genero) {
        $aux[] = $generos[$genero];
    }
    
    return $aux;
}

?>