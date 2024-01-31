<?php

#iniciamos o continuamos sesion
session_start();

#iniciar los campos del formulario
$nombre = null;
$observaciones = null;
$fichero = null;

#Compruebo si existe algun error
if(isset($_SESSION['error'])){
    $error = $_SESSION['error'];
    $errores = $_SESSION['errores'];

    //autocompletar formulario
    $nombre = $_SESSION ['nombre'];
    $observaciones = $_SESSION['observaciones'];
    $fichero = $_SESSION ['fichero'];

    //elimino variables de sesion afectadas
    unset($_SESSION['error']);
    unset($_SESSION['errores']);
    unset($_SESSION['nombre']);
    unset($_SESSION['observaciones']);
    unset($_SESSION['fichero']);
}

#Compruebo si existe algun mensaje
if(isset($_SESSION['mensaje'])){
    $mensaje = $_SESSION['mensaje'];  #guardamos el mensaje

}

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Formulario subida Archivos</h1>
        <!-- Formulario -->
        <form action="validar.php" method="POST" enctype="multipart/form-data">
            <!-- Lo primero es poner un maximo de longitud -->
            <!-- Campo oculto -->
            <input type="hidden" name="MAX_FILE_SIZE" value="2097152">

            <!-- Nombre -->
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" id="exampleFormControlInput1" placeholder="nombre completo" value="<?=$nombre?>">
            </div>
            <!-- Observaciones -->
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Observaciones</label>
                <textarea name="Observaciones" class="form-control" id="exampleFormControlTextarea1" rows="3"><?= $observaciones?></textarea>
            </div>
            <!-- fichero con validacion cliente mediante parámetro accept -->
            <div class="mb-3">
                <label for="formfile" class="form-label">Seleccione Archivo</label>
                <input class="form-control" type="file" name="fichero" id="formFile" accept="image/*" value=<?=$fichero?>>
            </div>
            <!-- Botones de accion -->
            <button class="btn btn-primary" type="submit">Enviar</button>
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>