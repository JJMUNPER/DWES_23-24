<?php

/**
 * Programacion Orientada a Objetos
 * 
 * Ejemplo 1. Creación de una clase con encapsulamiento.
 * 
 */

class Vehiculo
{

    private $modelo;
    private $nombre;
    private $velocidad;
    private $matricula;

    public function __construct()
    {

        $this->modelo = null;
        $this->nombre = null;
        $this->velocidad = 0;
        $this->matricula = null;
    }


    #Setters
    //Modificar los valores de los atributos de un objeto

    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setVelocidad($velocidad)
    {
        $this->velocidad = $velocidad;
    }

    public function setMatricula($matricula)
    {
        $this->matricula = $matricula;
    }

    #Getters
    //Obtener los valores de de los atributos de un objeto

    public function getModelo(){
        return $this->modelo;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getVelocidad(){
        return $this->velocidad;
    }

    public function getMatricula(){
        return $this->matricula;
    }


}
?>