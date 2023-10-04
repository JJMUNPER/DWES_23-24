<!DOCTYPE html>
<html lang="es">
    <head>
        <?php include 'views/plantilla/head.html' ?>
        <title>Proyecto 2.2 - Lanzamiento Proyectiles</title>
    </head>
    <body>
        <!-- Capa principal -->
        <div class="container">
            <!-- Cabecera Documento -->
            <header class="pb-3 mb-4 border-bottom">
                <!-- iconos -->
                <i class="bi bi-bullseye"></i>
                <span class="fs-4">Proyecto 2.2 - Lanzamiento Proyectiles</span>
                <i class="bi bi-bullseye"></i>
            </header>

            <legend>Lanzamiento Proyectiles</legend>
            <form method="POST">

                <!-- Valores -->
                <div class="mb-3">
                    <label class="form-label">Velocidad inicial</label>
                    <input type="number" name="velocidad" class="form-control" placeholder="" aria-describedby="helpId" step="0.01" value="0.00">
                    <small id="helpId" class="text-muted">Velocidad en m/s</small>
                </div>

                <div class="mb-3">
                    <label class="form-label">Angulo de lanzamiento</label>
                    <input type="number" name="angulo" class="form-control" placeholder="" aria-describedby="helpId" step="0.01" value="0.00">
                    <small id="helpId" class="text-muted">Angulo en grados</small>
                </div>

                <!-- Botones de acción -->

                <div class="btn-group" role="group">
                    <button type="reset" class="btn btn-secondary" >Borrar</button>
                    <button type="submit" class="btn btn-warning " formaction="./calcular.php">Calcular</button>
                    
                </div>


            </form>

            <!-- Pie del codumento -->
            <?php include 'views/plantilla/footer.html' ?>
            
        </div>

        <!-- javascript bootstrap 532 -->
        <?php include 'views/plantilla/javascript.html' ?>
    </body>
</html>