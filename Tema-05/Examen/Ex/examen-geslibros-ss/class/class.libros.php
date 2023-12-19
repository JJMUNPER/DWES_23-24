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


    }



?>