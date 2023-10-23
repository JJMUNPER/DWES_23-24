<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Incluir head -->
    <title>Formulario de acceso</title>
    <?php include 'views/layouts/head.html' ?>
</head>

<body>
    <!-- Capa principal -->
    <div class="container">

        <!-- cabecera documento -->
        <header class="pb-3 mb-4 border-bottom">
            <i class="bi bi-calculator">Formulario de acceso</i>
            <span class="fs-6"></span>
        </header>

        <legend>Datos de acceso</legend>

        <?php if ($perfil == 'administrador'): ?>
            <button type="button" class="btn btn-primary">Nuevo</button>
            <button type="button" class="btn btn-primary">Actualizar</button>
            <button type="button" class="btn btn-primary">Consultar</button>
            <button type="button" class="btn btn-primary">Eliminar</button>

        <?php elseif ($perfil == 'editor'): ?>
            <button type="button" class="btn btn-primary">Nuevo</button>
            <button type="button" class="btn btn-primary">Actualizar</button>
            <button type="button" class="btn btn-primary">Consultar</button>

        <?php else:
            ($perfil == 'usuario') ?>
            <button type="button" class="btn btn-primary">Consultar</button>
        <?php endif ?>


        <table class="table">
            <tbody>

                <tr>
                    <th>Nombre Usuario</th>
                    <td>
                        <?= $usuario ?>
                    </td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>
                        <?= $email ?>
                    </td>
                </tr>
                <tr>
                    <th>Contraseña</th>
                    <td>
                        <?= $password ?>
                    </td>
                </tr>
                <tr>
                    <th>Usuario</th>
                    <td>
                        <?= $perfil ?>
                    </td>
                </tr>

        </table>

        <a class="btn btn-primary" href="index.php" role="button">Volver</a>


        <!-- Pié del documento -->
        <?php include 'views/layouts/footer.html' ?>

    </div>

    <!-- javascript bootstrap 532 -->
    <?php include 'views/layouts/javascript.html' ?>
</body>

</html>