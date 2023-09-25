<?php

    $usuario = "Jota";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo 03 - Tema 2</title>
</head>

<body>
    <center>
        <h2>Ejemplo 3 - Tema 2</h2>
    </center>

    <h4>
    <?php

    echo "Hola Mundo"; 
    echo "<br>";
    echo "Soy $usuario";

    ?>
</h4>
</body>

</html>

/**

Este codigo no cumpliria con los estandares
pues se esta mezclando php con html

Las comillas simples y dobles no son lo mismo si
se pone esto:
echo 'Soy $usuario';
Sale literalmente esto
Si se quiere usar las comillas simples habria que concadenar
se haria asi  -
echo 'Soy' . $usuario;
*/