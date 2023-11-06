<?php

/**
 * 
 * Clase Deportivo
 * 
 */

class Deportivo extends Vehiculo
{

	private $cilindrada;
	private $km;


	public function __construct(
		$nombre = null,
		$modelo = null,
		$matricula = null,
		$velocidad = null,
		$cilindrada,
		$km
	) {
		/**
		 * Esto se pone para que herede tambien el constructor de la calse padre
		 * y tambien hay que meter los parametros en la entrada del constructor
		 */

		parent::__construct($nombre, $modelo, $matricula, $velocidad);

		$this->cilindrada = $cilindrada;
		$this->km = $km;
	}

	/**
	 * Cuando se usa private o protected
	 * 
	 * En la clase padre se usa protected para que se puedan heredar sus campos, es 
	 * menos restrictiva que private
	 */


	/**
	 * @return mixed
	 */
	public function getCilindrada()
	{
		return $this->cilindrada;
	}

	/**
	 * @param mixed $cilindrada 
	 * @return self
	 */
	public function setCilindrada($cilindrada): self
	{
		$this->cilindrada = $cilindrada;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getKm()
	{
		return $this->km;
	}

	/**
	 * @param mixed $km 
	 * @return self
	 */
	public function setKm($km): self
	{
		$this->km = $km;
		return $this;
	}
}

?>