<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'views/layouts/head.php' ?>
    <title>Proyecto 4.3 - Alumnos</title>
</head>

<body>
    <!-- Capa principal -->
    <div class="container">

        <!-- cabecera documento -->
        <header class="pb-3 mb-4 border-bottom">
        <i class="bi bi-bullseye"></i>
            <span class="fs-6">Alumnos</span>
        </header>

        <legend>Formulario Mostrsr Alumno</legend>

        <!-- Formulario Nuevo articulo -->
        
            <!-- id -->
            <div class="mb-3">
            <label class="form-label">id</label>
                <input type="number" class="form-control" name="id" value="<?= $alumno->id; ?>" disabled>
                <!-- <div class="form-text">Introduzca identificador del articulo</div> -->
            </div>
            <!-- nombrr -->
            <div class="mb-3">
            <label class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?= $alumno->nombre; ?>" disabled>
                <!-- <div class="form-text">Introduzca título articulo existente</div> -->
            </div>
            <!-- apellidos -->
            <div class="mb-3">
            <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" class="form-control" name="apellidos" value="<?= $alumno->apellidos ?>" disabled>
                <!-- <div class="form-text">Introduzca modelo del articulo</div> -->
            </div>
            <!-- emai -->
            <div class="mb-3">
            <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="<?= $alumno->email ?>" readonly>
                
            </div>
            <!-- Fecha Nac -->
            <div class="mb-3">
            <label for="fecha_nacimiento" class="form-label">Fecha Nacimiento</label>
                <input type="text" class="form-control" name="fecha_nacimiento" value="<?= $alumno->fecha_nacimiento ?>" readonly>
                <!-- <div class="form-text">Introduzca Precio</div> -->
            </div>
            <!-- Curso -->
            <div class="mb-3">
                <label class="form-label">Curso</label>
                <select class="form-select" aria-label="Default select example" name="curso" disabled>
                    <?php foreach ($cursos as $key => $curso): ?>
                        <option value="<?= $key ?>" <?= ($alumno->curso == $key) ? 'selected' : null ?> disabled>
                            <?= $curso ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <!-- Asignaturas -->
            <div class="mb-3">
                <label for="asignaturas" class="form-label">Asignaturas</label>
                <input type="text" class="form-control"
                    value="<?= implode(', ', ArrayAlumnos::mostrarAsignaturas($asignaturas, $alumno->asignatura)) ?> "
                    disabled>
            </div>


            <a class="btn btn-secondary" href="index.php" role="button">Volver</a>
            

        </form>

        <br>
        <br>
        <br>




        <!-- Pié del documento -->
        <?php include 'views/partials/footer.php' ?>

    </div>

    <!-- javascript bootstrap 532 -->
    <?php include 'views/layouts/javascript.php' ?>
</body>

</html>