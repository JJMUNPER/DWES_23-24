<?php

    /*
        Clase Jugador
    */

    class Jugador {

        private $id;
        private $nombre;
        private $numero;
        private $pais;
        private $equipo;
        private $posiciones;
        private $contrato;

        #posiciones equipos y paises estaticos
        public function __construct($id, $nombre, $numero, $pais, $equipo, $posiciones, $contrato) {
            $this->id = $id;
            $this->nombre = $nombre;
            $this->numero = $numero;
            $this->pais = $pais;
            $this->equipo = $equipo;
            $this->posiciones = $posiciones;
            $this->contrato = $contrato;
        }

        public function getId() {
            return $this->id;
        }
     
        public function setId($id) {
            $this->id = $id;
        }

        

        /**
         * Get the value of nombre
         */ 
        public function getNombre()
        {
                return $this->nombre;
        }

        /**
         * Set the value of nombre
         *
         * @return  self
         */ 
        public function setNombre($nombre)
        {
                $this->nombre = $nombre;

                return $this;
        }

        /**
         * Get the value of numero
         */ 
        public function getNumero()
        {
                return $this->numero;
        }

        /**
         * Set the value of numero
         *
         * @return  self
         */ 
        public function setNumero($numero)
        {
                $this->numero = $numero;

                return $this;
        }

        /**
         * Get the value of pais
         */ 
        public function getPais()
        {
                return $this->pais;
        }

        /**
         * Set the value of pais
         *
         * @return  self
         */ 
        public function setPais($pais)
        {
                $this->pais = $pais;

                return $this;
        }

        /**
         * Get the value of equipo
         */ 
        public function getEquipo()
        {
                return $this->equipo;
        }

        /**
         * Set the value of equipo
         *
         * @return  self
         */ 
        public function setEquipo($equipo)
        {
                $this->equipo = $equipo;

                return $this;
        }

        /**
         * Get the value of posiciones
         */ 
        public function getPosiciones()
        {
                return $this->posiciones;
        }

        /**
         * Set the value of posiciones
         *
         * @return  self
         */ 
        public function setPosiciones($posiciones)
        {
                $this->posiciones = $posiciones;

                return $this;
        }

        /**
         * Get the value of contrato
         */ 
        public function getContrato()
        {
                return $this->contrato;
        }

        /**
         * Set the value of contrato
         *
         * @return  self
         */ 
        public function setContrato($contrato)
        {
                $this->contrato = $contrato;

                return $this;
        }
    }

?>