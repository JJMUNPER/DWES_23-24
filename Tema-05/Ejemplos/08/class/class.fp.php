<?php

    /**
     * Clase Fp
     * 
     * Métodos específicos para BBDD fp con las tablas
     * 
     *          -Alumnos
     *          -Cursos
     * 
     */

     class Fp extends Conexion{

        public function inser_curso(Curso $curso){

            try{

                #Prepare o plantilla sql
                $sql = "
                    INSERT INTO Cursos (
                        nombre,
                        ciclo,
                        nombreCorto,
                        nivel
                    )VALUES(
                        :nombre,
                        :ciclo,
                        :nombreCorto,
                        :nivel
                    )
                ";
                # Objeto de la clase PDOStatement
                //Heredo pdost de la clase conexion
                $pdostmt = $this -> pdo -> prepare ($sql);

                #Vincular los parámetros con valores
                $pdostmt -> bindParam(':nombre', $curso -> nombre, PDO::PARAM_STR, 50);
                $pdostmt -> bindParam(':ciclo', $curso -> ciclo, PDO::PARAM_STR, 50);
                $pdostmt -> bindParam(':nombreCorto', $curso->nombreCorto, PDO::PARAM_STR, 4);
                $pdostmt -> bindParam(':nivel', $curso -> nivel, PDO::PARAM_INT, 1);

                #Ejecutamos sql
                $pdostmt -> execute();

                #Liberamos objeto
                $pdostmt = null;

                #Cerramos conexion
                $this -> pdo = null;

            }
            catch(Exception $e){

                include 'views/partials/errorDB.php';
                exit();

            }
        }
     }


?>