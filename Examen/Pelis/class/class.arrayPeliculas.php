<?php

/**
 * 
 * class.arrayPeliculas.php
 * 
 * tabla de Peliculas
 * 
 * 
 */

class ArrayPeliculas
{

    public $tabla;

    public function __construct()
    {

        $this->tabla = [];

    }

    /**
     * @return mixed
     */
    public function getTabla()
    {
        return $this->tabla;
    }

    /**
     * @param mixed $tabla 
     * @return self
     */
    public function setTabla($tabla): self
    {
        $this->tabla = $tabla;
        return $this;
    }

    static public function getGeneros()
    {

        $generos = [

            "Acción",
            "Aventura",
            "Comedia",
            "Drama",
            "Deportes",
            "Ensayo",
            "Terror",
            "Bélica",
            "Suspense",
            "Histórico"

        ];

        asort($generos);
        return $generos;

    }

    public function getPeliculas()
    {

        $pelicula = new Pelicula(
            1,
            'Nombre Película 1',
            58,
            'Nombre Director 1',
            [0, 3],
            2021
        );

        $this->tabla[] = $pelicula;

        $pelicula = new Pelicula(
            2,
            'Nombre Película 2',
            58,
            'Nombre Director 2',
            [0, 3],
            2021
        );

        $this->tabla[] = $pelicula;

        $pelicula = new Pelicula(
            3,
            'Nombre Película 3',
            58,
            'Nombre Director 3',
            [0, 3],
            2021
        );

        $this->tabla[] = $pelicula;

        $pelicula = new Pelicula(
            4,
            'Nombre Película 4',
            58,
            'Nombre Director 4',
            [0, 3],
            2021
        );

        $this->tabla[] = $pelicula;

        $pelicula = new Pelicula(
            5,
            'Nombre Película 5',
            58,
            'Nombre Director 5',
            [0, 3],
            2021
        );

        $this->tabla[] = $pelicula;

        $pelicula = new Pelicula(
            6,
            'Nombre Película 6',
            58,
            'Nombre Director 6',
            [0, 3],
            2021
        );

        $this->tabla[] = $pelicula;

        return $pelicula;

    }

    static public function mostrarGenero(
        $generos,
        $generosPeliculas
    ) {

        $array = [];

        foreach ($generosPeliculas as $indice) {
            $array[] = $generosPeliculas[$indice];
        }
        asort($array);
        return $array;
    }

    public function delete($indice)
    {
        if (isset($this->tabla[$indice])) {
            unset($this->tabla[$indice]);
            $this->tabla = array_values($this->tabla); // Corregido
        }
    }

    public function create(Pelicula $data)
    {
        $this->tabla[] = $data;
    }

    public function update($indice, Pelicula $data)
    {
        $this->tabla[$indice] = $data;
    }

    public function read($indice)
    {
        return $this->tabla[$indice];
    }



}


?>