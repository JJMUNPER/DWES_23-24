<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'views/layouts/head.php' ?>
    <title>Proyecto 4.2 - Gestión de Articulos</title>
</head>

<body>
    <!-- Capa principal -->
    <div class="container">
        <!-- Cabecera documento -->
        <?php include 'views/partials/header.php'; ?>

        <legend>Tabla Articulos</legend>

        <!-- Menú Principal -->
        <?php include 'views/partials/menu_prin.php' ?>
        <!-- Notificación -->
        <?php include 'views/partials/notificacion.php' ?>
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
                    <th>Poblacion</th>
                    <th>Email</th>
                    <th>Telefono</th>
                    <th>Curso</th>
                    <th>Acciones</th>


                </tr>
            </thead>
            
            <tbody>
                <?php foreach ($alumnos as $alumno): ?>
                    <tr>
                        <!-- $alumno es un objeto de la clase mysqli_result -->
                        <td><?= $alumno['id'] ?></td>
                        <td><?= $alumno['alumno'] ?></td>
                        <td class="text-end"><?= $alumno['edad'] ?></td>
                        <td><?= $alumno['dni'] ?></td>
                        <td><?= $alumno['poblacion']?></td>
                        <td ><?= $alumno['email'] ?></td>
                        <td ><?= $alumno['telefono'] ?> </td>
                        <td ><?= $alumno['curso'] ?> </td>


                        <!-- boton eliminar  -->
                        <td>
                            <a href="eliminar.php?id=<?= $alumno['id'] ?>" title="Eliminar">
                                <i class="bi bi-trash3"></i></a>

                            <!-- boton editar  -->

                            <a href="editar.php?id=<?= $alumno['id']  ?>" title="Editar">
                                <i class="bi bi-pencil-square"></i></a>

                            <a href="mostrar.php?id=<?= $alumno['id'] ?>" title="Mostrar">
                            <i class="bi bi-eye-fill"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="7">Nº Articulos
                        <?= count($alumnos -> num_rows) ?>
                    </td>
                </tr>
            </tfoot>

        </table>


        <!-- Pie del documento  -->
        
        <?php include 'partials/footer.php'?>

    </div>

    <!-- javascript bootstrap 532 -->
    <?php include 'views/layouts/javascript.php' ?>
</body>

</html>