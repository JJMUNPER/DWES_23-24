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

    public function update_libro(Libro $libro, $id)
    {
        try {
            // Prepare o plantilla sql
            $sql = "
                UPDATE INTO libros (
                    id,
                    isbn,
                    ean,
                    titulo,
                    autor_id,
                    editorial_id,
                    precio_coste,
                    precio_venta,
                    stock,
                    stock_min,
                    stock_max,
                    fecha_edicion,
                    create_at,
                    update_at,
                    num_pag
                ) VALUES (
                    NULL,
                    :isbn,
                    NULL,
                    :titulo,
                    :autor_id,
                    :editorial_id,
                    :precio_coste,
                    :precio_venta,
                    :stock,
                    NULL,
                    NULL,
                    :fecha_edicion,
                    NULL,
                    NULL,
                    :num_pag
                )
            ";

            // Preparamos el pdostmt
            $pdostmt = $this->pdo->prepare($sql);

            // Vincular los parámetros con valores
            $pdostmt->bindParam(':isbn', $libro->isbn, PDO::PARAM_STR, 13);
            $pdostmt->bindParam(':titulo', $libro->titulo, PDO::PARAM_STR, 80);
            $pdostmt->bindParam(':autor_id', $libro->autor_id, PDO::PARAM_INT, 10);
            $pdostmt->bindParam(':editorial_id', $libro->editorial_id, PDO::PARAM_INT, 10);
            $pdostmt->bindParam(':precio_coste', $libro->precio_coste);
            $pdostmt->bindParam(':precio_venta', $libro->precio_venta);
            $pdostmt->bindParam(':stock', $libro->stock, PDO::PARAM_INT, 10);
            $pdostmt->bindParam(':fecha_edicion', $libro->fecha_edicion);
            $pdostmt->bindValue(':num_pag', $libro->num_pag, PDO::PARAM_INT);
            $pdostmt->bindParam(':id', $id, PDO::PARAM_INT);
            # Execute the SQL statement
            $pdostmt->execute();

            # Free the PDOStatement object
            $pdostmt = null;

            # Close the connection
            $this->pdo = null;
        } catch (PDOException $e) {
            include('views/partials/errorDB.php');
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
            libros.precio_venta AS pvp,
            num_pag as paginas
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

    // public function filtrar(){
    //     $sql = "SELECT * FROM geslibros";
        
    //     $stmt = $this->libro->prepare($sql);
    //     $expresion = "%" . $libros . "%";
    //     $stmt->bindParam(':expresion', $libro, PDO::PARAM_STR);
    //     $stmt->execute();

    //     return $stmt->fetchAll(PDO::FETCH_OBJ);
    // }
}



?>