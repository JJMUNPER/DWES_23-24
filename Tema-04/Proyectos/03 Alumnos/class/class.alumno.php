<?php
/*

	Clase alumno


*/

class Alumno
{
	//Atributos de la clase
	public $id;
	public $nombre;
	public $apellidos;
	public $email;
	public $fecha_nacimiento;
	public $curso;
	public $asignaturas;


	// Creamos el constructor
	public function __construct(
		$id = null,
		$nombre = null,
		$apellidos = null,
		$email = null,
		$fecha_nacimiento = null,
		$curso = null,
		$asignaturas = []
	) {
		$this->id = $id;
		$this->nombre = $nombre;
		$this->apellidos = $apellidos;
		$this->email= $email;
		$this->fecha_nacimiento = $fecha_nacimiento;
		$this->curso = $curso;
		$this->asignaturas = $asignaturas;

	}

public function getEdad(){

	$fechaNacimiento = new DateTime($this->fecha_nacimiento);
	$hoy = new DateTime();
	$edad= $hoy->diff($fechaNacimiento)->y;
	return $edad;

}




}


?>