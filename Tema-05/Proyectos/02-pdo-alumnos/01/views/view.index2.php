<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'views/layouts/head.html' ?>
    <title>Proyecto 5.2 - Gestión Alumnos PDO</title>
</head>

<body>
    <!-- Capa principal -->
    <div class="container">

        <!-- cabecera documento -->
        <?php include 'views/partials/header.php' ?>

        <legend>Tabla Alumnos</legend>

        <!-- Menu Principal -->
        <?php include 'views/partials/menu_prin.php' ?>

        <!-- Notificación -->
        <?php include 'views/partials/notify.php' ?>

        <!-- Muestra datos de la tabla -->
        <table class="table">
            <!-- Encabezado tabla -->
            <thead>
                <tr>
                    <!-- personalizado -->
                    <th>Id</th>
                    <th>Alumno</th>
                    <th class="text-end">Edad</th>
                    <th>DNI</th>
                    <th>Población</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Curso</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <!-- Mostramos cuerpo de la tabla -->
            <tbody>

                <!-- Objeto PDO statemes puede ser asignado a foreach -->
                <?php while ($alumno = $alumnos->fecht()): ?>
                    <tr>
                        <!-- Formatos distintos para cada  columna -->

                        <!-- Detalles de alumnos -->
                        <td><?= $alumno->id ?></td>
                        <td><?= $alumno-> alumno ?></td>
                        <td class="text-end"><?= $alumno->edad ?></td>
                        <td><?= $alumno-> dni ?></td>
                        <td><?= $alumno->poblacion ?></td>
                        <td><?= $alumno->email ?></td>
                        <td><?= $alumno->telefono ?></td>
                        <td><?= $alumno->curso ?></td>
                       
                        <!-- botones de acción -->
                        <td>
                            <!-- botón  eliminar -->
                            <a href="eliminar.php?id=<?= $alumno->id ?>" title="Eliminar">
                            <i class="bi bi-trash-fill"></i></a>

                            <!-- botón  editar -->
                            <a href="editar.php?id=<?= $alumno->id ?>" title="Editar">
                            <i class="bi bi-pencil-square"></i></a>

                            <!-- botón  mostrar -->
                            <a href="mostrar.php?id=<?= $alumno->id?> ?>" title="Mostrar">
                            <i class="bi bi-card-text"></i></a>

                        </td>
                    </tr>

                <?php endwhile; ?>


            </tbody>
            <tfoot>
                <tr>
                    <td colspan="7">Nº Artículos
                        <?= $alumnos->rowCOUNT(); ?>
                    </td>
                </tr>
            </tfoot>
        </table>
        <!-- Cerramos conexion -->
        <?php  $alumnos=null; $conexion->cerrar_conexion()?>



        <!-- Pié del documento -->
        <?php include 'views/partials/footer.html' ?>

    </div>

    <!-- javascript bootstrap 532 -->
    <?php include 'views/layouts/javascript.html' ?>
</body>

</html>