<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'views/layouts/head.php' ?>
    <title>Proyecto 4.2 - Alumnos</title>
</head>

<body>
    <!-- Capa principal -->
    <div class="container">


        <!-- cabecera documento -->
        <?php include 'partials/header.php' ?>
        <header class="pb-3 mb-4 border-bottom">
            <i class="bi bi-bullseye"></i>
            <span class="fs-6">Editar Alumnos</span>
        </header>

        <!-- Menú -->
        

        <legend>Formulario Edición Alumno</legend>

        <!-- Formulario Nuevo articulo -->
        <form action="update.php?indice=<?= $indice ?>" method="POST">
            <!-- id -->
            <div class="mb-3">
                <label for="descripcion" class="form-label">Id</label>
                <input type="text" class="form-control" name="id" value="<?= $alumno->id ?>" readonly>
                <!-- <div class="form-text">Introduzca identificador del articulo</div> -->
            </div>
            <!-- nombre -->
            <div class="mb-3">
                <label for="descripcion" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?= $alumno->nombre ?>">
                <!-- <div class="form-text">Introduzca título articulo existente</div> -->
            </div>
            <!-- apellidos -->
            <div class="mb-3">
                <label for="modelo" class="form-label">Apellidos</label>
                <input type="text" class="form-control" name="apellidos" value="<?= $alumno->apellidos ?>">
                <!-- <div class="form-text">Introduzca modelo del articulo</div> -->
            </div>
            <!-- email -->
            <div class="mb-3">
                <label for="modelo" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="<?= $alumno->email ?>">
                <!-- <div class="form-text">Introduzca modelo del articulo</div> -->
            </div>
            <!-- Fecha Nac -->
            <div class="mb-3">
                <label for="modelo" class="form-label">Fecha Nac</label>
                <input type="fecha" class="form-control" name="fecha_nacimiento" value="<?= $alumno->fecha_nacimiento ?>">
                <!-- <div class="form-text">Introduzca modelo del articulo</div> -->
            </div>
            <!-- curso -->
            <div class="mb-3">
                <label class="form-label">Curso</label>
                <div class="form-control">
                    <?php foreach ($cursos as $indiceCuso => $curso): ?>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="<?= $indiceCuso ?>" name="curso"
                            <?= (in_array($indiceCuso, (array) $alumno->curso) ? 'checked' : null) ?>>
                             <label class="form-check-label"><!-- ArrayAlumnos::getCursos() -->
                                <?= $curso ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <!-- Unidades -->
            
            <!-- Precio -->
            
            <!-- Género -->
            <div class="mb-3">
                <label class="form-label">Asignaturas</label>
                <div class="form-control">
                    <?php foreach ($asignaturas as $indiceAsignatura => $asignatura): ?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="<?= $indiceAsignatura ?>"
                                name="asignaturas[]" <?= (in_array($indiceAsignatura, $alumno->asignatura) ? 'checked' : null) ?>>
                            <label class="form-check-label">
                                <?= $asignatura ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>




            <a class="btn btn-secondary" href="index.php" role="button">Cancelar</a>

            <button type="submit" class="btn btn-primary">Actualizar</button>

        </form>

        <br>
        <br>
        <br>




        <!-- Pié del documento -->
        <?php include 'partials/footer.php' ?>

    </div>

    <!-- javascript bootstrap 532 -->
    <?php include 'views/layouts/javascript.php' ?>
</body>

</html>