<?php

/*
    Clase Alumnos

    Métodos específicos para BBDD  fp con las tablas
    - Alumnos
    - Cursos
*/

class Alumnos extends Conexion
{

    /**
     * get alumnos
     */

    public function getAlumnos()
    {

        $sql = "SELECT 
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
        ON alumnos.id_curso = cursos.id
        ORDER BY id";

        # Prepare -> objeto clase pdostatement
        $pdostmt = $this->pdo->prepare($sql);

        # Establezco tipo de fecht
        $pdostmt->setFetchMode(PDO::FETCH_OBJ);

        #Ejecuto
        $pdostmt->execute();

        # Devuelvo objeto clase pdostatement
        return $pdostmt;


    }

    /**
     * get Cursos
     * Obtengo los cursos de la tabla cursos de la BBDD fp
     */

    public function getCursos()
    {

        $sql = "SELECT 
            id, nombreCorto curso
        FROM
            cursos
        ORDER BY id";

        # Prepare -> objeto clase pdostatement
        $pdostmt = $this->pdo->prepare($sql);

        # Establezco tipo de fecht
        $pdostmt->setFetchMode(PDO::FETCH_OBJ);

        #Ejecuto
        $pdostmt->execute();

        # Devuelvo objeto clase pdostatement
        return $pdostmt;


    }

    public function insert_curso(Curso $curso)
    {

        try {

            # Prepare o plantilla sql
            $sql = "
                    INSERT INTO Cursos (
                        nombre,
                        ciclo,
                        nombreCorto,
                        nivel
                    ) VALUES (
                        :nombre,
                        :ciclo,
                        :nombreCorto,
                        :nivel
                    )
                
                ";

            # objeto de clase PDOStatement
            $pdostmt = $this->pdo->prepare($sql);

            # Vincular los parámetros con valores
            $pdostmt->bindParam(':nombre', $curso->nombre, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':ciclo', $curso->ciclo, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':nombreCorto', $curso->nombreCorto, PDO::PARAM_STR, 4);
            $pdostmt->bindParam(':nivel', $curso->nivel, PDO::PARAM_INT, 1);

            #ejecutamos sql
            $pdostmt->execute();

            # liberamos objeto 
            $pdostmt = null;

            # cerramos conexión
            $this->pdo = null;
        } catch (PDOException $e) {

            include('views/partials/errorDB.php');
            exit();

        }
    }

    /**
     * Insertar alumno
     */

     public function insertAlumno(Alumno $alumno)
    {
        try{
        # Prepare
        $sql = "INSERT INTO Alumnos VALUES
                    (
                        null,
                        :nombre,
                        :apellidos,
                        :email,
                        :telefono,
                        :direccion,
                        :poblacion,
                        :provincia,
                        :nacionalidad,
                        :dni,
                        :fechaNac,
                        :id_curso)
                        ";

        # Objeto clase mysqli_stmt
        $pdostmt = $this->pdo->prepare($sql);

        # Vinculo parámetros con variables
        $pdostmt -> bindParam(':nombre', $alumno->nombre,PDO::PARAM_STR,30);
        $pdostmt -> bindParam(':apellidos', $alumno->apellidos,PDO::PARAM_STR,50);
        $pdostmt -> bindParam(':email', $alumno->email,PDO::PARAM_STR,50);
        $pdostmt -> bindParam(':telefono', $alumno->telefono,PDO::PARAM_STR,9);
        $pdostmt -> bindParam(':direccion', $alumno->direccion,PDO::PARAM_STR,50);
        $pdostmt -> bindParam(':poblacion', $alumno->poblacion,PDO::PARAM_STR,30);
        $pdostmt -> bindParam(':provincia', $alumno->provincia,PDO::PARAM_STR,30);
        $pdostmt -> bindParam(':nacionalidad', $alumno->nacionalidad,PDO::PARAM_STR,30);
        $pdostmt -> bindParam(':dni', $alumno->dni,PDO::PARAM_STR,9);
        $pdostmt -> bindParam(':fechaNac', $alumno->fechaNac);
        $pdostmt -> bindParam(':id_curso', $alumno->id_curso,PDO::PARAM_INT);
           
    
        # Ejecuto mysqli_stmt e inserto registro
        $pdostmt -> execute();

        # Libero memoria
        $pdostmt=null;

        $this->pdo = null;
    }
catch (PDOException $e) {

    include('views/partials/errorDB.php');
    exit();

}

}

public function update_alumno(Alumno $alumno, $id_alumno)
    {
        try {

            # Prepare o plantilla sql
            $sql = "UPDATE alumnos
            SET
            nombre = :nombre, 
            apellidos = :apellidos, 
            email = :email, 
            telefono = :telefono, 
            direccion = :direccion, 
            poblacion = :poblacion, 
            provincia = :provincia, 
            nacionalidad = :nacionalidad, 
            dni = :dni, 
            fechaNac = :fechaNac, 
            id_curso = :id_curso
            WHERE id = $id_alumno";

            echo "SQL: $sql";

            # objeto de clase PDOStatement
            $pdostmt = $this->pdo->prepare($sql);

            # Vincular los parámetros con valores
            $pdostmt->bindParam(':nombre', $alumno->nombre, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(':apellidos', $alumno->apellidos, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':email', $alumno->email, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':telefono', $alumno->telefono, PDO::PARAM_STR, 9);
            $pdostmt->bindParam(':direccion', $alumno->direccion, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':poblacion', $alumno->poblacion, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(':provincia', $alumno->provincia, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(':nacionalidad', $alumno->nacionalidad, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(':dni', $alumno->dni, PDO::PARAM_STR, 9);
            $pdostmt->bindParam(':fechaNac', $alumno->fechaNac);
            $pdostmt->bindParam(':id_curso', $alumno->id_curso, PDO::PARAM_INT, 10);

            # ejecutamos sql
            $pdostmt->execute();

            # liberamos objeto 
            $pdostmt = null;

            # cerramos conexión
            $this->pdo = null;

        } catch (PDOException $e) {

            include('views/partials/errorDB.php');
            exit();
        }
    }
}
?>