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
                num_fotos,
                num_visitas,
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
                0,
                0,
                :carpeta,
                NOW()
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

            // Creanos la carpeta, con permisos totales
            mkdir('imagenes/' . $album->carpeta, 0777);

        } catch (PDOException $e) {
            include_once('template/partials/errorDB.php');
            exit();
        }

    }

    public function getAlbum($id)
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

    public function update(classAlbum $album, $id) //Carpeta de Origen o  album origen?
    {

        try {

            $sql = "
                
                UPDATE albumes
                SET
                    titulo = :titulo,
                    descripcion = :descripcion,
                    autor = :autor,
                    fecha = :fecha,
                    lugar = :lugar,
                    categoria = :categoria,
                    etiquetas = :etiquetas,
                    carpeta = :carpeta,
                    update_at = now()
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

            //$pdoSt->execute();

            //Cambiar el nombre al album
            //rename("imagenes/$album_orig", "imagenes/$album->carpeta");
            $rutaOrig = "imagenes/".$album->carpeta;
            $rutaDest =  "imagenes/" .$album->carpeta; //"/";
            rename($rutaOrig , $rutaDest);

            //Ejecutamos al final la consulta
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
                    etiquetas,
                    num_fotos,
                    num_visitas
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
                    etiquetas,
                    num_fotos,
                    num_visitas
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

    

    public function delete($id, $album)
    {
        try {

            $sql = "DELETE FROM albumes WHERE id = :id limit 1";
            $conexion = $this->db->connect();
            $pdost = $conexion->prepare($sql);
            $pdost->bindParam(':id', $id, PDO::PARAM_INT);
            $pdost->execute();

            # Para poder borrar la carpeta hay que iterar sobre la ruta para que los elimine poco a poco
            $archivos = glob('imagenes/' . $album . '/*.*');
            foreach ($archivos as $archivo) {
                if (is_file($archivo)) {
                    unlink($archivo);
                }
            }
            rmdir('imagenes/' . $album);

        } catch (PDOException $e) {

            include_once('template/partials/errorDB.php');
            exit();

        }
    }

    public function uploadFicheros($archivos, $carpeta)
    {
        # Generar un array de errores de fichero
        $fileUploadErrors = array(
            0 => 'No hay errores, el archivo se cargó con éxito',
            1 => 'El archivo subido excede la directiva upload_max_filesize en php.ini',
            2 => 'El archivo subido excede la directiva MAX_FILE_SIZE especificada en el formulario HTML',
            3 => 'El archivo subido se cargó solo parcialmente',
            4 => 'No se cargó ningún archivo',
            6 => 'Falta una carpeta temporal',
            7 => 'Error al escribir el archivo en el disco.',
            8 => 'Una extensión de PHP detuvo la carga del archivo.',
        );

        // Almacenará los errores encontrados en los archivos
        $errores = [];

        # Validar cada archivo subido
        foreach ($archivos['name'] as $index => $nombreArchivo) {
            # Comprobar si hay errores
            if ($archivos['error'][$index] !== UPLOAD_ERR_OK) {
                $errores[] = $fileUploadErrors[$archivos['error'][$index]];
            } else {
                # Validar el tamaño máximo
                $maxSize = 5 * 1024 * 1024; // 5 MB
                if ($archivos['size'][$index] > $maxSize) {
                    $errores[] = "El tamaño del archivo '$nombreArchivo' excede el límite de 5MB.";
                }

                # Validar el tipo de archivo
                $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                $fileInfo = new SplFileInfo($nombreArchivo);
                $extension = $fileInfo->getExtension();

                if (!in_array(strtolower($extension), $allowedExtensions)) {
                    $errores[] = "El archivo '$nombreArchivo' no es una imagen JPG, JPEG, PNG o GIF.";
                }
            }
        }

        # Si hay errores en algún archivo, cancelar la subida de todos los archivos
        if (!empty($errores)) {
            $_SESSION['error'] = implode(PHP_EOL, $errores);
            return; // Terminar el proceso de subida de archivo
        }

        # Si no hay errores, se procede a mover los archivos a la carpeta del álbum
        foreach ($archivos['name'] as $index => $nombreArchivo) {
            move_uploaded_file($archivos['tmp_name'][$index], 'imagenes/' . $carpeta . '/' . $nombreArchivo);
        }

        # Añadimos un mensaje  de confirmación
        $_SESSION['notify'] = "Imagenes subidas correctamente.";
    }

    public function visitaNueva($id)
    {
        try {
            // Creamos la consulta sql
            $sql = "UPDATE albumes SET num_visitas=num_visitas+1 WHERE id = :id limit 1";

            // Creamos la conexión
            $conexion = $this->db->connect();

            // Preparamos la consulta
            $pdost = $conexion->prepare($sql);

            // Vinculamos la variable
            $pdost->bindParam(':id', $id);

            // Ejecutamos la consulta
            $pdost->execute();

        } catch (PDOException $e) {

            include_once('template/partials/errorDB.php');
            exit();

        }
    }
    public function totalImagenes($id, $numImagenes)
    {
        try {
            // Creamos la consulta sql
            $sql = "UPDATE albumes SET num_fotos=:numFotos WHERE id = :id limit 1";

            // Creamos la conexión
            $conexion = $this->db->connect();

            // Preparamos la consulta
            $pdost = $conexion->prepare($sql);

            // Vinculamos la variable
            $pdost->bindParam(':id', $id);
            $pdost->bindParam(':numFotos', $numImagenes);

            // Ejecutamos la consulta
            $pdost->execute();

        } catch (PDOException $e) {

            include_once('template/partials/errorDB.php');
            exit();

        }
    }

    public function obtenerIdAlbum($albumId)
    {
        try {
            $sql = "
                    SELECT 
                            carpeta
                    FROM 
                            albumes
                    WHERE
                            id = :id
            ";

            # Conectaxion con la base de datos
            $conexion = $this->db->connect();

            #Preparaamos
            $pdoSt = $conexion->prepare($sql);

            $pdoSt->bindParam(':id', $albumId, PDO::PARAM_INT);
            $pdoSt->setFetchMode(PDO::FETCH_OBJ);
            #Ejecutamos
            $pdoSt->execute();

            return $pdoSt->fetch();

        } catch (PDOException $e) {
            include_once('template/partials/errorDB.php');
            exit();
        }
    }

    public function validateFecha($fecha)
    {
        if (date('Y-m-d', strtotime($fecha)) == $fecha) {
            return true;
        } else {
            return false;
        }
    }




}

?>