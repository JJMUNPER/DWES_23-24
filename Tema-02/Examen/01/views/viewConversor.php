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
            <i class="bi bi-calculator">Calculadora Conversor Decimal</i>
            <span class="fs-6"></span>
        </header>

        <legend>Resultado Conversión</legend>
        <table class="table">
            <tbody>

                <tr>
                    <th>Decimal</th>
                    <td>
                        <?= $valorDecimal ?>
                    </td>
                </tr>
                <tr>
                    <th>Binario</th>
                    <td>
                        <?= $valorBinario ?>
                    </td>
                </tr>
                <tr>
                    <th>Octal</th>
                    <td>
                        <?= $valorOctal ?>
                    </td>
                </tr>
                <tr>
                    <th>Hexadecimal</th>
                    <td>
                        <?= $valorHexadecimal ?>
                    </td>
                </tr>
            </tbody>
        </table>

        <a class="btn btn-primary" href="index.php" role="button">Volver</a>

        <!-- Pié del documento -->
        <?php include 'views/layouts/footer.html' ?>

    </div>

    <!-- javascript bootstrap 532 -->
    <?php include 'views/layouts/javascript.html' ?>
</body>

</html>