<!-- Vista: viewUsuario
    Descripcion: Muestra los datos del Usuario -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo 03 - Tema 2</title>
</head>

<body>
    <center>
        <h2>Ejemplo 9 - Tema 2</h2>
    </center>

    <table border=1 width="50%">
        <tr>
            <th>Usuario</th>
            <th>Categoria</th>
            <th>Curso</th>
        </tr>
        <tr>
            <td><?= $usuario?></td>
            <td><?= $categoria?></td>
            <td><?= $curso?></td>
        </tr>
    </table>
   
    
</body>

</html>