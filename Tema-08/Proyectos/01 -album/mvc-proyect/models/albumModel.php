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

class albumModel extends Model
{

    /*
        Extrae los detalles  de los albumes
    */
    public function get()
    {

        try {

            # comando sql; Seleccionamos la tabla albumes completa
            $sql = "
                SELECT 
                    *
                    FROM albumes
                    ORDER BY id
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

    // public function getCursos() {

    //     try {
    //         # Plantilla
    //         $sql = "

    //             SELECT 
    //                     id,
    //                     nombreCorto curso
    //             FROM 
    //                     cursos
    //             ORDER BY 
    //                     nombreCorto

    //         ";

    //         # Conectar con la base de datos
    //         $conexion = $this->db->connect();

    //         # ejecutar PREPARE
    //         $result = $conexion->prepare($sql);

    //         # establezco com quiero que devuelva el resultado
    //         $result->setFetchMode(PDO::FETCH_OBJ);

    //         # ejecuto
    //         $result->execute();

    //         return $result;


    //     } catch (PDOException $e){

    //         include_once('template/partials/errorDB.php');
    //         exit();

    //     }


    // }

    public function create(classAlbum $album)
    {

        try {
            $sql = "
            INSERT INTO albumes (
                titulo,
                descripcion,
                autor,
                fecha,
                lugar,
                categoria,
                etiquetas,
                carpeta,
                created_at
            )
            VALUES (
                :titulo,
                :descripcion,
                :autor,
                :fecha,
                :lugar,
                :categoria,
                :etiquetas,
                :carpeta
            )
    ";
            # Conectar con la base de datos
            $conexion = $this->db->connect();

            # Preparar el statement (objeto)
            $pdoSt = $conexion->prepare($sql);

            # Vinculamos parametros al objeto
            $pdoSt->bindParam(':titulo', $album->titulo, PDO::PARAM_STR, 100);
            $pdoSt->bindParam(':descripcion', $album->descripcion, PDO::PARAM_STR, 100);
            $pdoSt->bindParam(':autor', $album->autor, PDO::PARAM_STR, 75);
            $pdoSt->bindParam(':fecha', $album->fecha, PDO::PARAM_STR);
            $pdoSt->bindParam(':lugar', $album->lugar, PDO::PARAM_STR, 75);
            $pdoSt->bindParam(':categoria', $album->categoria, PDO::PARAM_STR, 100);
            $pdoSt->bindParam(':etiquetas', $album->etiquetas, PDO::PARAM_STR, 100);
            $pdoSt->bindParam(':carpeta', $album->carpeta, PDO::PARAM_STR, 75);

            $pdoSt->execute();

        } catch (PDOException $e) {
            include_once('template/partials/errorDB.php');
            exit();
        }

    }

    public function read($id)
    {

        try {
            $sql = "
                    SELECT 
                        *       
                        FROM 
                            albumes
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

    public function update(classAlbum $album, $id) //Carpeta de Origen?
    {

        try {

            $sql = "
                
                UPDATE alumnos
                SET
                    titulo = :titulo,
                    descripcion = :descripcion,
                    autor = :autor,
                    fecha = :fecha,
                    lugar = :lugar,
                    categoria = :categoria,
                    etiquetas = :etiquetas,
                    carpeta = :carpeta
                WHERE
                        id = :id
                LIMIT 1
                ";

            $conexion = $this->db->connect();

            $pdoSt = $conexion->prepare($sql);

            $pdoSt->bindParam(':id', $id, PDO::PARAM_INT);

            # Vinculamos parametros al objeto
            $pdoSt->bindParam(':titulo', $album->titulo, PDO::PARAM_STR, 100);
            $pdoSt->bindParam(':descripcion', $album->descripcion, PDO::PARAM_STR, 100);
            $pdoSt->bindParam(':autor', $album->autor, PDO::PARAM_STR, 75);
            $pdoSt->bindParam(':fecha', $album->fecha, PDO::PARAM_STR);
            $pdoSt->bindParam(':lugar', $album->lugar, PDO::PARAM_STR, 75);
            $pdoSt->bindParam(':categoria', $album->categoria, PDO::PARAM_STR, 100);
            $pdoSt->bindParam(':etiquetas', $album->etiquetas, PDO::PARAM_STR, 100);
            $pdoSt->bindParam(':carpeta', $album->carpeta, PDO::PARAM_STR, 75);

            $pdoSt->execute();

        } catch (PDOException $e) {
            include_once('template/partials/errorDB.php');
            exit();
        }

    }

    /*
       Extrae los detalles  de los album
   */
    public function order(int $criterio)
    {

        try {

            # comando sql
            $sql = "
                SELECT 
                    id,
                    titulo,
                    descripcion,
                    autor,
                    fecha,
                    categoria,
                    etiquetas
                FROM
                    albumes
                
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

    public function filter($expresion)
    {
        try {
            $sql = "

                SELECT 
                    id,
                    titulo,
                    descripcion,
                    autor,
                    fecha,
                    categoria,
                    etiquetas
                FROM
                    albumes
                WHERE
                CONCAT_WS(  ', ', 
                    id,
                    titulo,
                    descripcion,
                    autor,
                    fecha,
                    categoria,
                    etiquetas) 
                like :expresion

            ORDER BY 
                albumes.id
            
            ";
            # Conectar con la base de datos
            $conexion = $this->db->connect();

            $pdost = $conexion->prepare($sql);

            $pdost->bindValue(':expresion', '%' . $expresion . '%', PDO::PARAM_STR);
            $pdost->setFetchMode(PDO::FETCH_OBJ);
            $pdost->execute();
            return $pdost;

        } catch (PDOException $e) {

            include_once('template/partials/errorDB.php');
            exit();

        }

    }

    // # Validación email único
    // public function validateUniqueEmail($email)
    // {
    //     try {

    //         $sql = " 

    //             SELECT * FROM alumnos 
    //             WHERE email = :email
            
    //         ";

    //         # conectamos con la base de datos
    //         $conexion = $this->db->connect();
    //         $pdost = $conexion->prepare($sql);
    //         $pdost->bindParam(':email', $email, PDO::PARAM_STR);
    //         $pdost->execute();

    //         if ($pdost->rowCount() != 0) {
    //             return FALSE;
    //         }

    //         return TRUE;


    //     } catch (PDOException $e) {

    //         include_once('template/partials/errorDB.php');
    //         exit();

    //     }
    // }

    // # Validación dni único
    // public function validateUniqueDNI($dni)
    // {
    //     try {

    //         $sql = " 

    //             SELECT * FROM alumnos 
    //             WHERE dni = :dni
            
    //         ";

    //         # conectamos con la base de datos
    //         $conexion = $this->db->connect();
    //         $pdost = $conexion->prepare($sql);
    //         $pdost->bindParam(':dni', $dni, PDO::PARAM_STR);
    //         $pdost->execute();

    //         if ($pdost->rowCount() != 0) {
    //             return FALSE;
    //         }

    //         return TRUE;


    //     } catch (PDOException $e) {

    //         include_once('template/partials/errorDB.php');
    //         exit();

    //     }
    // }

    // # Validación curso
    // public function validateCurso($id_curso)
    // {
    //     try {

    //         $sql = " 

    //             SELECT * FROM cursos 
    //             WHERE id = :id_curso
            
    //         ";

    //         # conectamos con la base de datos
    //         $conexion = $this->db->connect();
    //         $pdost = $conexion->prepare($sql);
    //         $pdost->bindParam(':id_curso', $id_curso, PDO::PARAM_INT);
    //         $pdost->execute();

    //         if ($pdost->rowCount() == 1) {
    //             return TRUE;
    //         }

    //         return FALSE;


    //     } catch (PDOException $e) {

    //         include_once('template/partials/errorDB.php');
    //         exit();

    //     }
    // }

    public function delete($id)
    {
        try {

            $sql = "DELETE FROM album WHERE id = :id limit 1";
            $conexion = $this->db->connect();
            $pdost = $conexion->prepare($sql);
            $pdost->bindParam(':id', $id, PDO::PARAM_INT);
            $pdost->execute();

        } catch (PDOException $e) {

            include_once('template/partials/errorDB.php');
            exit();

        }
    }




}

?>