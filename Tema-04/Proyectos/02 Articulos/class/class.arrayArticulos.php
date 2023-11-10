<?php

/**
 *  class.arrayArticulos.php
 * 
 * tabla de articulos
 * 
 * Es un array donde cada elementos es un objeto de la clase Articulo
 */

class ArrayArticulos
{
    private $tabla;


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

    static public function getMarcas()
    {
        $marcas = [
            'Dell',
            'Lenovo',
            'Asus',
            'Acer',
            'Toshiba',
            'Hp',
            'Apple',
            'MSI',
            'Fujitsu',
            'LG'
        ];
        asort($marcas);
        return $marcas;
    }
    static public function getCategorias()
    {
        $categorias = [
            'Portátil',
            'PC sobremesa',
            'Componente',
            'Pantalla',
            'Impresora',
            'Imagen',
            'Fotografia'
        ];
        asort($categorias);
        return $categorias;
    }


    #Se crea el objeto y lo pone  en la tabla
    public function getDatos()
    {
        #Articulo 1
        $articulo = new Articulo(
            1,
            'Portátil - HP 15-DB0074NS',
            'HP 15-DB0074NS',
            0,
            [2, 3, 4],
            120,
            379
        );

        #Añadir datos a la tabla
        $this->tabla[] = $articulo;

        #Articulo 2
        $articulo = new Articulo(
            2,
            'Portátil - AMD A4-9125, 8GB RAM, 125GB',
            'HP 255 G7, 15.6',
            3,
            [1, 3, 2],
            200,
            20.5
        );

        #Añadir datos a la tabla
        $this->tabla[] = $articulo;

        #Articulo 3
        $articulo = new Articulo(
            3,
            'PC Sobremesa - Lenovo Intel Core i3-8100',
            'IdeaCentre 510S-07ICB',
            5,
            [1, 3],
            50,
            12.95
        );

        #Añadir datos a la tabla
        $this->tabla[] = $articulo;

        #Articulo 4
        $articulo = new Articulo(
            4,
            'PC Sobremesa - HP 290 APU AMD Dual-Core A6',
            'HP 290-a0002ns',
            4,
            [2, 4],
            120,
            15.95
        );

        #Añadir datos a la tabla
        $this->tabla[] = $articulo;

        #Articulo 5
        $articulo = new Articulo(
            5,
            'PC Sobremesa - Pavilion Dual-Core A6',
            'Asus',
            6,
            [2, 4],
            143,
            500
        );

        #Añadir datos a la tabla
        $this->tabla[] = $articulo;
    }

    #podemos declarar este metodo como estatico porque no modifica ninguna propiedad de la clase
    static public function mostrarCategorias(
        $categorias,
        $categoriasArticulo
    ) 
    {
        $arrayCategorias = [];
        foreach ($categoriasArticulo as $indice) {
            $arrayCategorias[] = $categorias[$indice];
        }
        asort($arrayCategorias);
        return $arrayCategorias;
    }

    public function create (Articulo $data){
        $this->tabla[] = $data;

    }

    public function delete ($indice){
        unset($this->tabla[$indice]);
        array_values($this->tabla);
    }
}

?>