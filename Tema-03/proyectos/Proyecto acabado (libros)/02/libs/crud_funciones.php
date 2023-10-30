<?php

    /*

        funcion: buscar_en_array()
        descripción: busca un valor en una determinada columna de un array con índice secundario asociativo
        parámetros: 
                    - tabla
                    - nombre de la columna donde deseamos realizar la búsqueda
                    - valor de búsqueda
        salida: 
                    - índice de la tabla donde se encuentra el valor
                    - false en caso que no encuentre el valor

    */

    function buscar_en_array($tabla, $columna, $valor) {

        // Devuelve un array con los valores de una determinada columna
        $columna_valores = array_column($tabla, $columna);

        // Devuelve falso o el índice del array donde se encuentra el valor
        // El parámetro false indica que la búsqueda no es estricta
        return array_search($valor, $columna_valores, false);

    }

    /*

        funcion: eliminar()
        descripción: elimina un  elemento de la tabla
        parámetros: 
                    - tabla
                    - id del elemento que deseo eliminar
        salida: 
                    - tabla actualizada

    */

    function eliminar ($tabla = [], $id) {
        if ($indice = (buscar_en_array($tabla, 'id', $id))) {
            unset ($tabla[$indice]);
            return $tabla;
        } else {
            echo 'Registro no encontrado';
        }
         
    
    }

?>