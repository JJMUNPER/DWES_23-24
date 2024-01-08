    <?php

    /*
        Clase libros 

        Aquí se definirán los métodos necesarios para completar el examen
        
    */

    class Libros extends Conexion{

        public function getLibros(){
            $sql = 'SELECT
            libros.id,
            libros.titulo,
            autores.nombre as autor,
            editoriales.nombre as editorial,
            libros.stock as unidades,
            libros.precio_coste as coste,
            libros.precio_venta as pvp
            FROM
            libros
            INNER JOIN
            autores ON libros.autor_id = autores.id
            INNER JOIN
            editoriales ON libros.editorial_id=editoriales.id
            ORDER BY id';

            #prepare
            $pdostmt = $this->pdo->prepare($sql);
            #fetch
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);
            #execute
            $pdostmt->execute();
            #Retorno obj
            return $pdostmt;
            
        }

        public function getAutores(){

             //Creamos la query de SQL
             $sql = "SELECT 
             id,
             nombre
             FROM geslibros.autores";
 
             //Preparamos el statement con un Objeto de la clase PDOstatement
             $pdostmt = $this->pdo->prepare($sql);
 
             //Establecemos tipo de fetch
             $pdostmt->setFetchMode(PDO::FETCH_OBJ);
 
             //Se ejecuta
             $pdostmt->execute();
 
             //Devolvemos el objeto que ahora será de tipo pdostatement
             return $pdostmt;

        }

        public function getEditoriales(){

            //Creamos la query de SQL
            $sql = "SELECT 
            id,
            nombre
            FROM geslibros.editoriales";

            //Preparamos el statement con un Objeto de la clase PDOstatement
            $pdostmt = $this->pdo->prepare($sql);

            //Establecemos tipo de fetch
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            //Se ejecuta
            $pdostmt->execute();

            //Devolvemos el objeto que ahora será de tipo pdostatement
            return $pdostmt;

        }

    }



?>