<?php

/**
 *  class.arrayAlumnos.php
 * 
 * tabla de Alumnos
 * 
 * Es un array donde cada elementos es un objeto de la clase Articulo
 */

class ArrayAlumnos 
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

    static public function getCursos()
    {
        $marcas = [
            '1SMR',
            '2SMR',
            '1DAW',
            '2DAW',
            '1ADI',
            '2ADI'
        ];
        asort($cursos);
        return $cursos;
    }
    static public function getAsignaturas()
    {
        $asignaturas = [
            '1DAW Base de Datos',
            '1DAW Entornos de Desarrollo',
            '1DAW Formacion y Orientación Laboral',
            '1DAW Lenguajes de Marcas y Sistemas de Gestión de Informacón',
            '1DAW Programación',
            '1DAW Sistemas Informáticos',
            '2DAW Desarrollo web Entono Cliente',
            '2DAW Desarrollo web Entono Servidor',
            '2DAW Despliegue Aplicaciones Web'
        ];
        asort($asignaturas);
        return $asignaturas;
    }


    #Se crea el objeto y lo pone  en la tabla
    public function getDatos()
    {
        #Alumno 1
        $alumno = new Alumno(
            1,
            'Juan Manuel',
            'Herrera Ramírez',
            'jmherrera@gmail.com',
            '06/03/2002',
            2,
            [3, 4, 7]
            
        );

        #Añadir datos a la tabla
        $this->tabla[] = $alumno;

        #Alumno 2
        $articulo = new Articulo(
            2,
            'Juan Jesus',
            'Muñoz Perez',
            'jjmunper@gmail.com',
            '06/03/2000',
            2,
            [3,2,4]
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
    static public function mostrarAsignaturas(
        $asignaturas,
        $asignaturasAlumno
    ) 
    {
        $array = [];
        foreach ($categoriasArticulo as $indice) {
            $arrayCategorias[] = $categorias[$indice];
        }
        asort($arrayCategorias);
        return $arrayCategorias;
    }

    public function create (Alumno $data){
        $this->tabla[] = $data;

    }

    public function delete ($indice){
        unset($this->tabla[$indice]);
        array_values($this->tabla);
    }

    

    public function update($indice, Articulo $data)
    {
        $this->tabla[$indice] = $data;
    }

    public function read ($indice){
        return $this->tabla[$indice];
    }

    public function order (){
        
    }
}

?>