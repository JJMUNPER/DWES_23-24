<?php

/*  Fichero: funcionesPeliculas.php
    Descripción: Funciones para la gestión completa de una tabla de películas
    Fecha: 30/10/2023
    Autor: Juan Carlos Moreno
*/


# Generamos array de paises del mundo
function getPaises()
{
    $paises = array("Afganistán", "Albania", "Alemania", "Andorra", "Angola", "Antigua y Barbuda", "Arabia Saudita", "Argelia", "Argentina", "Armenia", "Australia", "Austria", "Azerbaiyán", "Bahamas", "Bangladés", "Barbados", "Baréin", "Bélgica", "Belice", "Benín", "Bielorrusia", "Birmania", "Bolivia", "Bosnia y Herzegovina", "Botsuana", "Brasil", "Brunéi", "Bulgaria", "Burkina Faso", "Burundi", "Bután", "Cabo Verde", "Camboya", "Camerún", "Canadá", "Catar", "Chad", "Chile", "China", "Chipre", "Ciudad del Vaticano", "Colombia", "Comoras", "Corea del Norte", "Corea del Sur", "Costa de Marfil", "Costa Rica", "Croacia", "Cuba", "Dinamarca", "Dominica", "Ecuador", "Egipto", "El Salvador", "Emiratos Árabes Unidos", "Eritrea", "Eslovaquia", "Eslovenia", "España", "Estados Unidos", "Estonia", "Etiopía", "Filipinas", "Finlandia", "Fiyi", "Francia", "Gabón", "Gambia", "Georgia", "Ghana", "Granada", "Grecia", "Guatemala", "Guyana", "Guinea", "Guinea ecuatorial", "Guinea-Bisáu", "Haití", "Honduras", "Hungría", "India", "Indonesia", "Irak", "Irán", "Irlanda", "Islandia", "Islas Marshall", "Islas Salomón", "Israel", "Italia", "Jamaica", "Japón", "Jordania", "Kazajistán", "Kenia", "Kirguistán", "Kiribati", "Kuwait", "Laos", "Lesoto", "Letonia", "Líbano", "Liberia", "Libia", "Liechtenstein", "Lituania", "Luxemburgo", "Madagascar", "Malasia", "Malaui", "Maldivas", "Malí", "Malta", "Marruecos", "Mauricio", "Mauritania", "México", "Micronesia", "Moldavia", "Mónaco", "Mongolia", "Montenegro", "Mozambique", "Namibia", "Nauru", "Nepal", "Nicaragua", "Níger", "Nigeria", "Noruega", "Nueva Zelanda", "Omán", "Países Bajos", "Pakistán", "Palaos", "Palestina", "Panamá", "Papúa Nueva Guinea", "Paraguay", "Perú", "Polonia", "Portugal", "Reino Unido", "República Centroafricana", "República Checa", "República de Macedonia", "República del Congo", "República Democrática del Congo", "República Dominicana", "República Sudafricana", "Ruanda", "Rumanía", "Rusia", "Samoa", "San Cristóbal y Nieves", "San Marino", "San Vicente y las Granadinas", "Santa Lucía", "Santo Tomé y Príncipe", "Senegal", "Serbia", "Seychelles", "Sierra Leona", "Singapur", "Siria", "Somalia", "Sri Lanka", "Suazilandia", "Sudán", "Sudán del Sur", "Suecia", "Suiza", "Surinam", "Tailandia", "Tanzania", "Tayikistán", "Timor Oriental", "Togo", "Tonga", "Trinidad y Tobago", "Túnez", "Turkmenistán", "Turquía", "Tuvalu", "Ucrania", "Uganda", "Uruguay", "Uzbekistán", "Vanuatu", "Venezuela", "Vietnam", "Yemen", "Yibuti", "Zambia", "Zimbabue");
    return $paises;
}


# Generamos el array de categorías
function getGeneros()
{

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

    sort($generos);

    return $generos;
}


# Generamos la tabla a partir de arrays cuyos índices indican el nombre del campo de una tabla
function getPeliculas()
{

    $tabla = [
        [
            "id" => 1,
            "titulo" => "joker",
            "pais" => 59,
            "director" => "Todd Phillips",
            "generos" => [5, 2, 4],
            "año" => 2019,
        ],
        [
            "id" => 2,
            "titulo" => "Mientras dure la guerra",
            "pais" => 58,
            "director" => "Alejandro Amenábar",
            "generos" => [3, 8],
            "año" => 2019
        ],
        [
            "id" => 3,
            "titulo" => "Terminator.Destino oscuro",
            "pais" => 59,
            "director" => "Tim Miller",
            "generos" => [7, 9],
            "año" => 2019

        ],
        [
            "id" => 4,
            "titulo" => "La vida es bella",
            "pais" => 89,
            "director" => "Roberto Benini",
            "generos" => [2, 3, 4],
            "año" => 1997

        ]

    ];


    return $tabla;

}





# Devuelve el array de géneros que le corresponden a una película
function mostrarGeneros($generos, $indiceGeneros)
{
    $aux = [];

    foreach ($indiceGeneros as $indice) {
        if (isset($generos[$indice])) {
            $aux[] = $generos[$indice];
        }
    }


    sort($generos);
    return $aux;
}


?>