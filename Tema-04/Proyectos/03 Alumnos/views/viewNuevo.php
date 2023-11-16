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
        <header class="pb-3 mb-4 border-bottom">
        <i class="bi bi-bullseye"></i>
            <span class="fs-6">Proyecto 4.2 - Alumnos</span>
        </header>

        <legend>Formulario Nuevo Alumno</legend>

        <!-- Formulario Nuevo Libro -->
        <form action="create.php" method="POST">
            <!-- id -->
            <div class="mb-3">
                <label for="titulo" class="form-label">Id</label>
                <input type="text" class="form-control" name="id">
                <!-- <div class="form-text">Introduzca identificador del libro</div> -->
            </div>
            <!-- Descripcion -->
            <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre">
                <!-- <div class="form-text">Introduzca título libro existente</div> -->
            </div>
            <!-- Modelo -->
            <div class="mb-3">
            <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" class="form-control" name="apellidos">
                <!-- <div class="form-text">Introduzca Autor del libro</div> -->
            </div>
            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" name="email">
            </div>
            <!-- Fecha Nacimiento -->
            <div class="mb-3">
                <label for="fecha_nacimiento" class="form-label">Fecha Nacimiento</label>
                <input type="date" class="form-control" name="fecha_nacimiento">
            </div>
            <!-- marca -->
            <div class="mb-3">
                <label for="curso" class="form-label">Curso</label>
                <select class="form-select" aria-label="Default select example" name="curso">
                    <option selected disabled>Seleccione Curso</option>
                    <?php foreach ($cursos as $indice => $curso): ?>
                        <option value="<?= $indice ?>">
                            <?= $curso ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        
            <!-- Categoria -->
            <div class="mb-3">
                <label class="form-label">Asignaturas</label>
                <?php foreach ($asignaturas as $indice => $asignatura): ?>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="asignaturas[]" value="<?= $indice ?>">
                        <label class="form-check-label">
                            <?= $asignatura ?>
                        </label>
                    </div>
                <?php endforeach; ?>
            </div>


            <a class="btn btn-secondary" href="index.php" role="button">Cancelar</a>
            <button type="reset" class="btn btn-danger">Borrar</button>
            <button type="submit" class="btn btn-primary">Enviar</button>

        </form>

        <br>
        <br>
        <br>




        <!-- Pié del documento -->
        <?php include 'views/partials/footer.php'?>

    </div>

    <!-- javascript bootstrap 532 -->
    <?php include 'views/layouts/javascript.php' ?>
</body>

</html>