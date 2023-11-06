<?php

/**
 * Autor:Juan Jesus Muñoz Perez
 * 2ºDAW 23/24
 * 
 * Clase Calculadora
 * 
 */

 class Calculadora {

    private $valor1;
    private $valor2;
    private $operacion;
    private $resultado;


    //Constructor

    public function __construct(
        $valor1=null, 
        $valor2=null, 
        $operacion=null, 
        $resultado=null
        ) {
            $this->valor1 = $valor1;
            $this->valor2 = $valor2;
            $this->operacion = $operacion;
            $this->resultado = $resultado;
        }


        //Metodos

        //Metodo suma

        public function sumarValor(){

            $this ->resultado=$this ->valor1 + $this ->valor2;
			return $this ->resultado;

        }

        //Metodo resta
        public function restarValor(){

            $this ->resultado=$this ->valor1 - $this ->valor2;
			return $this ->resultado;
        }

        //Metodo multiplicacion

        public function multiplicaValor(){

            $this ->resultado=$this ->valor1 * $this ->valor2;
			return $this ->resultado;
        }

        //Metodo division

        public function dividirValor(){

            $this ->resultado=$this ->valor1 / $this ->valor2;
			return $this ->resultado;

        }

        //Metodo potencia

        public function potenciaValor(){

            $this ->resultado=pow($this ->valor1, $this ->valor2);
			return $this ->resultado;
        }

        //Set y Get de los campos de la clase
 
	/**
	 * @return mixed
	 */
	public function getValor1() {
		return $this->valor1;
	}
	
	/**
	 * @param mixed $valor1 
	 * @return self
	 */
	public function setValor1($valor1): self {
		$this->valor1 = $valor1;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getValor2() {
		return $this->valor2;
	}
	
	/**
	 * @param mixed $valor2 
	 * @return self
	 */
	public function setValor2($valor2): self {
		$this->valor2 = $valor2;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getOperacion() {
		return $this->operacion;
	}
	
	/**
	 * @param mixed $operacion 
	 * @return self
	 */
	public function setOperacion($operacion): self {
		$this->operacion = $operacion;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getResultado() {
		return $this->resultado;
	}
	
	/**
	 * @param mixed $resultado 
	 * @return self
	 */
	public function setResultado($resultado): self {
		$this->resultado = $resultado;
		return $this;
	}
}

?>