    <?php

    /*
        Clase libros 

        Aquí se definirán los métodos necesarios para completar el examen
        
    */

    class Libros extends Conexion{

        public function getLibros(){

            try {
                #sentencia sql
                $sql = "SELECT
                libros.id,
                libros.titulo,
                autores.nombre AS autor,
                editoriales.nombre AS editorial,
                libros.stock AS unidades,
                libros.precio_coste AS coste,
                libros.precio_venta AS pvp
                FROM
                geslibros.libros
                INNER JOIN
                autores ON autores.id = libros.autor_id
                INNER JOIN
                editoriales ON editoriales.id = libros.editorial_id
                ORDER BY id";

                #preparamos la sentencia
                $pdostmt = $this->pdo->prepare($sql);
                #Elegimos fetch
                $pdostmt->setFetchMode(PDO::FETCH_OBJ);
                #ejecutamos la consulta
                $pdostmt->execute();
                #devolver resultado(object PDO statement)
                return $pdostmt;
            } catch (PDOException $e){
                include 'views/partials/partial.errorDB.php';
                exit();
            }
        }

        public function getAutores(){

            try{
                #creamos la consulta
                $sql = 'SELECT
                autores.id, autores.nombre
                FROM
                geslibros.autores
                ORDER BY nombre';

                #se prepara la sentencia
                $pdostmt = $this->pdo->prepare($sql);
                #Elegimos fetch
                $pdostmt->setFetchMode(PDO::FETCH_OBJ);
                #Ejecutamos
                $pdostmt->execute();
                #Se devuelve el resultado
                return $pdostmt;
            } catch (PDOException $e){
                include 'views/partials/partial.errorDB.php';
                exit();
            }

        }

        public function getEditoriales(){
            try{

                $sql = 'SELECT
                editoriales.id,
                editoriales.nombre
                FROM
                geslibros.editoriales
                ORDER BY  nombre';

                #Sentencia
                $pdostmt = $this->pdo->prepare($sql);
                $pdostmt->setFetchMode(PDO::FETCH_OBJ);
                $pdostmt->execute();
                return $pdostmt;
            }  catch (PDOException $e){
                include 'views/partials/partial.errorDB.php';
                exit();
            }
        }


        public function insertarLibro(Libro $libro){
            try {
                // Creamos la sentencia
                $sql="INSERT INTO geslibros.libros VALUES(
                    null,
                    :isbn,
                    null,
                    :titulo,
                    :autor_id,
                    :editorial_id,
                    :precio_coste,
                    :precio_venta,
                    :stock,
                    null,
                    null,
                    :fecha_edicion,
                    null,
                    null
                    )";
                
                // Preparamos la sentencia
                $pdostmt = $this->pdo->prepare($sql);

                // Vinculamos las variables
                $pdostmt->bindParam(':isbn',$libro->isbn,PDO::PARAM_STR,13);
                $pdostmt->bindParam(':titulo',$libro->titulo,PDO::PARAM_STR,80);
                $pdostmt->bindParam(':autor_id',$libro->autor_id,PDO::PARAM_INT);
                $pdostmt->bindParam(':editorial_id',$libro->editorial_id,PDO::PARAM_INT);
                $pdostmt->bindParam(':precio_coste',$libro->precio_coste);
                $pdostmt->bindParam(':precio_venta',$libro->precio_venta);
                $pdostmt->bindParam(':stock',$libro->stock,PDO::PARAM_INT,10);
                $pdostmt->bindParam(':fecha_edicion',$libro->fecha_edicion);

                // Ejecutamos la consulta
                $pdostmt->execute();

                // Liberamos los recursos
                $pdostmt = null;

                // Cerramos la conexion
                $this->pdo = null;

            } catch (PDOException $e) {
                include 'views/partials/partial.errorDB.php';
                exit();
            }
        }


        public function order(int $criterio){
            try {
                // Creamos la consulta
                $sql = 'SELECT 
                libros.id,
                libros.titulo,
                autores.nombre AS autor,
                editoriales.nombre AS editorial,
                libros.stock AS unidades,
                libros.precio_coste AS coste,
                libros.precio_venta AS pvp
            FROM
                geslibros.libros
                    INNER JOIN
                autores ON autores.id = libros.autor_id
                    INNER JOIN
                editoriales ON editoriales.id = libros.editorial_id
            ORDER BY :order ASC';

            // Preparamos la sentencia
            $pdostmt = $this->pdo->prepare($sql);

            // Vinculamos la variable
            $pdostmt->bindParam(':order',$criterio,PDO::PARAM_INT);

            // Escogemos el tipo de fetch
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            // Ejecutamos la consulta
            $pdostmt->execute();

            // Devolvemos el resultado (Objeto de la clase PDOStatement)
            return $pdostmt;
            } catch (\Throwable $th) {
                include 'views/partials/partial.errorDB.php';
                exit();
            }
        }


    }



?>