<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Incluir head -->
    <title>Conversor</title>
    <?php include 'views/layouts/head.html' ?>
</head>

<body>
    <!-- Capa principal -->
    <div class="container">

        <!-- cabecera documento -->
        <header class="pb-3 mb-4 border-bottom">
            <i class="bi bi-calculator">Act 3.1 Formulario de registro</i>
            <span class="fs-6"></span>
        </header>

        <legend>Formulario de Registro</legend>
        <form method="POST" action="acceso.php">

            <!-- Formulario -->


            <!-- usuario -->
            <div class="mb-3">
                <label class="form-label">Usuario</label>
                <input type="text" class="form-control" aria-describedby="emailHelp" name="usuario">
                <div id="emailHelp" class="form-text">Entre 8 y 15 caracteres</div>
            </div>

            <!-- email -->
            <div class="mb-3">
                <label class="form-label">Usuario</label>
                <input type="text" class="form-control" aria-describedby="emailHelp" name="usuario">
                <div id="emailHelp" class="form-text">Entre 8 y 15 caracteres</div>
            </div>


            <!-- Botones de acción -->
            <button type="reset" class="btn btn-secondary">Borrar</button>

            <div class="btn-group" role="group">
                <button type="submit" class="btn btn-warning" formaction="binario.php">Binario</button>
                <button type="submit" class="btn btn-success" formaction="octal.php">Octal</button>
                <button type="submit" class="btn btn-danger" formaction="hexadecimal.php">Hexadecimal</button>
            </div>

            <button type="submit" class="btn btn-primary" formaction="conversor.php">Todas</button>



        </form>


        <!-- Pié del documento -->
        <?php include 'views/layouts/footer.html' ?>

    </div>

    <!-- javascript bootstrap 532 -->
    <?php include 'views/layouts/javascript.html' ?>
</body>

</html>