<?php

    /*
        alumnoModel.php

        Modelo del  controlador alumnos

        Definir los métodos de acceso a la base de datos
        
        - insert
        - update
        - select
        - delete
        - etc..
    */

    class alumnoModel extends Model {

        /*
            Extrae los detalles  de los alumnos
        */
        public function get() {

            try {

                # comando sql
                $sql = "
                SELECT 
                    alumnos.id,
                    concat_ws(', ', alumnos.apellidos, alumnos.nombre) alumno,
                    alumnos.email,
                    alumnos.telefono,
                    alumnos.poblacion,
                    alumnos.dni,
                    timestampdiff(YEAR,  alumnos.fechaNac, NOW() ) edad,
                    cursos.nombreCorto curso
                FROM
                    alumnos
                INNER JOIN
                    cursos
                ON 
                    alumnos.id_curso = cursos.id
                ORDER BY 
                    id
                ";

                # conectamos con la base de datos

                // $this->db es un objeto de la clase database
                // ejecuto el método connect de esa clase

                $conexion = $this->db->connect();

                # ejecutamos mediante prepare
                $pdost = $conexion->prepare($sql);

                # establecemos  tipo fetch
                $pdost->setFetchMode(PDO::FETCH_OBJ);

                #  ejecutamos 
                $pdost->execute();

                # devuelvo objeto pdostatement
                return $pdost;

            } catch (PDOException $e) {

                include_once('template/partials/errorDB.php');
                exit();

            }
        }

        public function getCursos() {

            try {
                # Plantilla
                $sql = "
                
                    SELECT 
                            id,
                            nombreCorto curso
                    FROM 
                            cursos
                    ORDER BY 
                            nombreCorto

                ";

                # Conectar con la base de datos
                $conexion = $this->db->connect();

                # ejecutar PREPARE
                $result = $conexion->prepare($sql);

                # establezco com quiero que devuelva el resultado
                $result->setFetchMode(PDO::FETCH_OBJ);

                # ejecuto
                $result->execute();

                return $result;


            } catch (PDOException $e){

                include_once('template/partials/errorDB.php');
                exit();
                
            }


        }

        public function create(classAlumno $alumno) {

            try {
            $sql = "
                    INSERT INTO Alumnos (
                        nombre,
                        apellidos,
                        email,
                        telefono,
                        poblacion,
                        dni,
                        fechaNac,
                        id_curso
                    )
                    VALUES (
                        :nombre,
                        :apellidos,
                        :email,
                        :telefono,
                        :poblacion,
                        :dni,
                        :fechaNac,
                        :id_curso
                    )
            ";
             # Conectar con la base de datos
             $conexion = $this->db->connect();

             $pdoSt = $conexion->prepare($sql);
 
             $pdoSt->bindParam(':nombre', $alumno->nombre, PDO::PARAM_STR, 30);
             $pdoSt->bindParam(':apellidos', $alumno->apellidos, PDO::PARAM_STR, 50);
             $pdoSt->bindParam(':email', $alumno->email, PDO::PARAM_STR, 50);
             $pdoSt->bindParam(':telefono', $alumno->telefono, PDO::PARAM_STR, 13);
             $pdoSt->bindParam(':poblacion', $alumno->poblacion, PDO::PARAM_STR, 30);
             $pdoSt->bindParam(':dni', $alumno->dni, PDO::PARAM_STR, 9);
             $pdoSt->bindParam(':fechaNac', $alumno->fechaNac);
             $pdoSt->bindParam(':id_curso', $alumno->id_curso, PDO::PARAM_INT);
 
             $pdoSt->execute();

         }  catch (PDOException $e) {
             include_once('template/partials/errorDB.php');
             exit();
         }

        }

        public function read($id) {

            try {
                $sql ="
                        SELECT 
                                id,
                                nombre, 
                                apellidos,
                                email,
                                telefono,
                                poblacion,
                                dni,
                                fechaNac,
                                id_curso
                        FROM 
                                alumnos
                        WHERE
                                id = :id
                ";

                # Conectar con la base de datos
                $conexion = $this->db->connect();

    
                $pdoSt = $conexion->prepare($sql);
    
                $pdoSt->bindParam(':id', $id, PDO::PARAM_INT);
                $pdoSt->setFetchMode(PDO::FETCH_OBJ);
                $pdoSt->execute();
                
                return $pdoSt->fetch();
    
            } catch (PDOException $e) {
                include_once('template/partials/errorDB.php');
                exit();
            }

        }

        public function update(classAlumno $alumno, $id) {

            try {

                $sql = "
                
                UPDATE alumnos
                SET
                        nombre = :nombre,
                        apellidos = :apellidos,
                        email = :email,
                        telefono = :telefono,
                        poblacion = :poblacion,
                        dni = :dni,
                        fechaNac = :fechaNac,
                        id_curso = :id_curso
                WHERE
                        id = :id
                LIMIT 1
                ";

                $conexion = $this->db->connect();
                
                $pdoSt = $conexion->prepare($sql);

                $pdoSt->bindParam(':id', $id, PDO::PARAM_INT);

                $pdoSt->bindParam(':nombre', $alumno->nombre, PDO::PARAM_STR, 30);
                $pdoSt->bindParam(':apellidos', $alumno->apellidos, PDO::PARAM_STR, 50);
                $pdoSt->bindParam(':email', $alumno->email, PDO::PARAM_STR, 50);
                $pdoSt->bindParam(':telefono', $alumno->telefono, PDO::PARAM_STR, 9);
                $pdoSt->bindParam(':poblacion', $alumno->poblacion, PDO::PARAM_STR, 30);
                $pdoSt->bindParam(':dni', $alumno->dni, PDO::PARAM_STR, 9);
                $pdoSt->bindParam(':fechaNac', $alumno->fechaNac);
                $pdoSt->bindParam(':id_curso', $alumno->id_curso, PDO::PARAM_INT);

                $pdoSt->execute();

        }
        catch(PDOException $e) {
            include_once('template/partials/errorDB.php');
            exit();
        }

        }

         /*
            Extrae los detalles  de los alumnos
        */
        public function order(int $criterio) {

            try {

                # comando sql
                $sql = "
                SELECT 
                    alumnos.id,
                    concat_ws(', ', alumnos.apellidos, alumnos.nombre) alumno,
                    alumnos.email,
                    alumnos.telefono,
                    alumnos.poblacion,
                    alumnos.dni,
                    timestampdiff(YEAR,  alumnos.fechaNac, NOW() ) edad,
                    cursos.nombreCorto curso
                FROM
                    alumnos
                INNER JOIN
                    cursos
                ON 
                    alumnos.id_curso = cursos.id
                ORDER BY 
                    :criterio
                ";

                # conectamos con la base de datos

                // $this->db es un objeto de la clase database
                // ejecuto el método connect de esa clase

                $conexion = $this->db->connect();

                # ejecutamos mediante prepare
                $pdost = $conexion->prepare($sql);

                $pdost->bindParam(':criterio', $criterio, PDO::PARAM_INT);

                # establecemos  tipo fetch
                $pdost->setFetchMode(PDO::FETCH_OBJ);

                #  ejecutamos 
                $pdost->execute();

                # devuelvo objeto pdostatement
                return $pdost;

            } catch (PDOException $e) {

                include_once('template/partials/errorDB.php');
                exit();

            }
        }

        public function filter($expresion) {
            try {
                $sql = "

                SELECT 
                    alumnos.id,
                    concat_ws(', ', alumnos.apellidos, alumnos.nombre) alumno,
                    alumnos.email,
                    alumnos.telefono,
                    alumnos.poblacion,
                    alumnos.dni,
                    timestampdiff(YEAR,  alumnos.fechaNac, NOW() ) edad,
                    cursos.nombreCorto curso
                FROM
                    alumnos
                INNER JOIN
                    cursos
                ON 
                    alumnos.id_curso = cursos.id
                WHERE

                    CONCAT_WS(  ', ', 
                                alumnos.id,
                                alumnos.nombre,
                                alumnos.apellidos,
                                alumnos.email,
                                alumnos.telefono,
                                alumnos.poblacion,
                                alumnos.dni,
                                TIMESTAMPDIFF(YEAR, alumnos.fechaNac, now()),
                                alumnos.fechaNac,
                                cursos.nombreCorto,
                                cursos.nombre) 
                    like :expresion

                ORDER BY 
                    alumnos.id
                
                ";

                # Conectar con la base de datos
                $conexion = $this->db->connect();

                $pdost = $conexion->prepare($sql);
                
                $pdost->bindValue(':expresion', '%'.$expresion.'%', PDO::PARAM_STR);
                $pdost->setFetchMode(PDO::FETCH_OBJ);
                $pdost->execute();
                return $pdost;

            } catch (PDOException $e){

                include_once('template/partials/errorDB.php');
                exit();
                
            }

    } 

    /**
     * Método validateUniqueEmail($email)
     */

     public function validateUniqueEmail($email){
        try {
            // Creamos la consulta
            $sql = "SELECT * FROM fp.alumnos  WHERE email = :email";

            # Conectar con la base de datos
            $conexion = $this->db->connect();
            $pdost = $conexion->prepare($sql);

            // Vinculamos la variable
            $pdost->bindParam(':email',$email,PDO::PARAM_STR);

            // Ejecutamos la sentencia
            $pdost->execute();

            if($pdost->rowCount()!=0){
                return false;

            }
            return true;
        } catch (PDOException $e){

            include_once('template/partials/errorDB.php');
            exit();
            
        }
     }

     /**
     * Método validateUniqueDni($dni)
     */

     public function validateUniqueDni($dni){
        try {
            // Creamos la consulta
            $sql = "SELECT * FROM fp.alumnos  WHERE dni = :dni";

            # Conectar con la base de datos
            $conexion = $this->db->connect();
            $pdost = $conexion->prepare($sql);

            // Vinculamos la variable
            $pdost->bindParam(':dni',$dni,PDO::PARAM_STR);

            // Ejecutamos la sentencia
            $pdost->execute();

            if($pdost->rowCount()!=0){
                return false;

            }
            return true;
        } catch (PDOException $e){

            include_once('template/partials/errorDB.php');
            exit();
            
        }
     }

     /**
     * Método validateCurso($id_curso)
     */

     public function validateCurso($id_curso){
        try {
            // Creamos la consulta
            $sql = "SELECT * FROM fp.cursos  WHERE id = :id_curso";

            # Conectar con la base de datos
            $conexion = $this->db->connect();
            $pdost = $conexion->prepare($sql);

            // Vinculamos la variable
            $pdost->bindParam(':id_curso',$id_curso,PDO::PARAM_INT);

            // Ejecutamos la sentencia
            $pdost->execute();

            if($pdost->rowCount()==1){
                return true;

            }
            return false;
        } catch (PDOException $e){

            include_once('template/partials/errorDB.php');
            exit();
            
        }
     }

     /**
      * Método delete
      */
      public function delete(int $id)
    {
        try {
            $sql = " DELETE FROM fp.alumnos WHERE alumnos.id = :id LIMIT 1";

        # Conectar con la base de datos
        $conexion = $this->db->connect();
        $pdostmt = $conexion->prepare($sql);
        
        // Vinculamos el parametro a eliminar
        $pdostmt->bindParam(":id",$id, PDO::PARAM_INT);

        // Ejecutamos la sentencia preparada
        $pdostmt->execute();

    } catch (PDOException $e) {
        include('views/partials/errorDB.php');
        exit();
    }
        
    }

    }  

?>