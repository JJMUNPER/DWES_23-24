<?php
/*

	Clase Pelicula


*/

class Pelicula
{
	//Atributos de la Pelicula
	public $id;
	public $titulo;
	public $paisId;
	public $director;
	public $generos;
	public $anno;
	


	// Creamos el constructor
	public function __construct(
		$id = null,
		$titulo = null,
		$paisId = null,
		$director = null,
		$generos = null,
		$anno = null
		
	) {
		$this->id = $id;
		$this->titulo = $titulo;
		$this->paisId = $paisId;
		$this->director = $director;
		$this->generos = $generos;
		$this->anno = $anno;
		

	}



	// public function getEdad()
	// {

	// 	$fechaNacimiento =DateTime::createFromFormat('d/m/Y', $this->generos);

	// 	$hoy = new DateTime();
	// 	$edad = $hoy->diff($fechaNacimiento)->y;
	// 	return $edad;
		

	// }




}


?>