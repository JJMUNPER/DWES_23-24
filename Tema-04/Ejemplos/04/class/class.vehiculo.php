<?php

/**
 * 
 * Clase Vehiculo
 * 
 */

class Vehiculo
{

	private $modelo;
	private $nombre;
	private $velocidad;
	private $matricula;


	//Constructor
	/**
	 * - Este es el modelo de constructor que se va a usar. Se creara un
	 * parametro por cada campo de la clase, y siempre seran opcinal; y 
	 * como se hace opcional, igualando los campos a null, para que no 
	 * sea obligatorio pasarle campos al crear un objeto nuevo.
	 * - Por conveccion los parametros siempre seran opcionales.
	 * - Si se pide que no tenga envoltorio, campos en public, que tenga
	 * envoltorio, con private
	 */
	public function __construct(
		$modelo=null, 
		$nombre=null, 
		$velocidad=null, 
		$matricula=null
		){

		$this->modelo = $modelo;
		$this->nombre = $nombre;
		$this->velocidad = $velocidad;
		$this->matricula = $matricula;
	}

	/**
	 * @return mixed
	 */
	public function getVelocidad()
	{
		return $this->velocidad;
	}

	/**
	 * @param mixed $velocidad 
	 * @return self
	 */
	public function setVelocidad($velocidad): self
	{
		$this->velocidad = $velocidad;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getModelo()
	{
		return $this->modelo;
	}

	/**
	 * @param mixed $modelo 
	 * @return self
	 */
	public function setModelo($modelo): self
	{
		$this->modelo = $modelo;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getNombre()
	{
		return $this->nombre;
	}

	/**
	 * @param mixed $nombre 
	 * @return self
	 */
	public function setNombre($nombre): self
	{
		$this->nombre = $nombre;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getMatricula()
	{
		return $this->matricula;
	}

	/**
	 * @param mixed $matricula 
	 * @return self
	 */
	public function setMatricula($matricula): self
	{
		$this->matricula = $matricula;
		return $this;
	}

	public function aumentarVelocidad()
	{
		$this->velocidad += 10;
	}


}

?>