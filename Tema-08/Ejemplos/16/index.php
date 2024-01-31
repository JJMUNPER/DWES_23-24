<?php


/**Aqui los arrays */



#Abro el fichero si no existe  lo crea
$alumnos_csv = fopen("csv/alumnos.csv", "ab");

foreach ($alumnos as $alumno){

    fputcsv($alumnos_csv, $alumno, ";");
}

fclose($alumnos_csv);

echo "fichero alumnos.csv creado con éxito";


?>