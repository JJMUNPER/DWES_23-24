<?php

/*
    Clase libros 

    Aquí se definirán los métodos necesarios para completar el examen
    
*/

class Libros extends Conexion
{

    public function getLibros()
    {

        #Sentencia SQL
        $sql = 'SELECT
            libros.id,
            libros.titulo,
            autores.nombre as autor,
            editoriales.nombre as editorial,
            libros.num_pag as paginas,
            libros.stock as unidades,
            libros.precio_coste as coste,
            libros.precio_venta as pvp
            FROM
            libros
                INNER JOIN
            autores ON libros.autor_id = autores.id
		    	INNER JOIN
		    editoriales ON libros.editorial_id = editoriales.id
            ORDER BY id';
        //prepare
        $pdostmt = $this->pdo->prepare($sql);

        //fetch
        $pdostmt->setFetchMode(PDO::FETCH_OBJ);

        //Se ejecuta
        $pdostmt->execute();

        //Devolvemos el objeto
        return $pdostmt;
    }

    public function readLibro(){

        $sql = 'SELECT
        id
        FROM geslibros.libros';

        //prepare
        $pdostmt = $this->pdo->prepare($sql);

        //fetch
        $pdostmt->setFetchMode(PDO::FETCH_OBJ);

        //Se ejecuta
        $pdostmt->execute();

        //Devolvemos el objeto
        return $pdostmt;
    }

    public function getEditoriales(){

            $sql = "SELECT 
            id,
            nombre
            FROM geslibros.editoriales";

            //prepare
        $pdostmt = $this->pdo->prepare($sql);

        //fetch
        $pdostmt->setFetchMode(PDO::FETCH_OBJ);

        //Se ejecuta
        $pdostmt->execute();

        //Devolvemos el objeto
        return $pdostmt;
    }

    public function getAutores(){

        $sql = 'SELECT
        id,
        nombre
        FROM geslibros.autores';

            //prepare
            $pdostmt = $this->pdo->prepare($sql);

            //fetch
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);
    
            //Se ejecuta
            $pdostmt->execute();
    
            //Devolvemos el objeto
            return $pdostmt;

    }

    public function filtrar(){
        $sql = "SELECT * FROM geslibros";
        
        $stmt = $this->libro->prepare($sql);
        $expresion = "%" . $libros . "%";
        $stmt->bindParam(':expresion', $libro, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}



?>