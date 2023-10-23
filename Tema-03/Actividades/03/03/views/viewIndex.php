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
            <i class="bi bi-calculator">Act 3.1 Formulario de registro</i>
            <span class="fs-6"></span>
        </header>

        <legend>Formulario de Registro</legend>
        <form method="POST" action="acceso.php">

            <!-- Valores para los campos -->
            <form action="" method="post">
                <?php for ($i = 1; $i <= $dia; $i++): ?>
                    <?php switch ($i):
                        case 1: ?>
                            <label for="Lunes" class="form-label">Lunes</label>
                            <input type="text" class="form-control" name="Lunes" id="" aria-describedby="helpId" placeholder="">
                            <?php break; ?>
                            <?php
                        case 2: ?>
                            <label for="Martes" class="form-label">Martes</label>
                            <input type="text" class="form-control" name="Martes" id="" aria-describedby="helpId" placeholder="">
                            <?php break; ?>

                            <?php
                        case 3: ?>

                            <label for="Miercoles" class="form-label">Miercoles</label>
                            <input type="text" class="form-control" name="Miercoles" id="" aria-describedby="helpId" placeholder="">
                            <?php break; ?>

                            <?php
                        case 4: ?>

                            <label for="Jueves" class="form-label">Jueves</label>
                            <input type="text" class="form-control" name="Jueves" id="" aria-describedby="helpId" placeholder="">

                            <?php break; ?>

                            <?php
                        case 5: ?>


                            <label for="Viernes" class="form-label">Viernes</label>
                            <input type="text" class="form-control" name="Viernes" id="" aria-describedby="helpId" placeholder="">

                            <?php break; ?>

                            <?php
                        case 6: ?>


                            <label for="Sabado" class="form-label">Sabado</label>
                            <input type="text" class="form-control" name="Sabado" id="" aria-describedby="helpId" placeholder="">

                            <?php break; ?>

                            <?php
                        case 7: ?>
                            <label for="Domingo" class="form-label">Domingo</label>
                            <input type="text" class="form-control" name="Domingo" id="" aria-describedby="helpId" placeholder="">
                            <?php break; ?>
                    <?php endswitch; ?>
                <?php endfor; ?>
            </form>


            <!-- Pié del documento -->
            <?php include 'views/layouts/footer.html' ?>

    </div>

    <!-- javascript bootstrap 532 -->
    <?php include 'views/layouts/javascript.html' ?>
</body>

</html>