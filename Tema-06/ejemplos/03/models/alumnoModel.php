<?php

    /**
     * 
     *  alumnosModel.php
     * 
     * Modelo del controlador alumnos
     * Definimos los métodos de acceso a la base de datos
     *  - Insert
     *  - Update
     *  - Select
     *  - Delete
     *  - etc...
     */
    class alumnoModel extends Model{
        /**
         * Extrae los detalles de los alumnos
         */
        public function get(){

            try{
                
                #Comando SQL
                $sql = "SELECT 
                alumnos.id,
                CONCAT_WS(', ', alumnos.apellidos, alumnos.nombre) AS nombre,
                alumnos.email,
                alumnos.telefono,
                alumnos.poblacion,
                alumnos.dni,
                TIMESTAMPDIFF(YEAR,
                    alumnos.fechaNac,
                    NOW()) AS edad,
                cursos.nombreCorto AS curso
            FROM
                fp.alumnos
                    INNER JOIN
                cursos ON alumnos.id_curso = cursos.id
            ORDER BY id";

                #Conectamos con la base de datos
                //$this->db es un objeto de la clase database
                //ejecuto el metodo connect de esa clase
                $conexion = $this->db->connect();

                #ejecutamos mediante prepare
                $pdost = $conexion->prepare($sql);

                #establecemos tipo fetch
                $pdost->setFetchMode(PDO::FETCH_OBJ);

                #Ejecutamos
                $pdost -> execute();

                # devuelvo objeto pdostament
                return $pdost;

            }catch(PDOException $e){

                include_once('template/partials/errorDB.php');
                exit();

            }

        }
    }
?>