<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'layouts/head.html' ?>
</head>

<body>
    <!-- Capa principal -->
    <div class="container">
        <!-- Cabecera -->
        <?php include 'partials/header.php' ?>
        <legend>Tabla con Artículos Informáticos</legend>

        <!-- Añadimos el menú -->
        <?php include 'partials/menu_prin.php' ?>



        <!-- Añadimos una tabla con los artículos -->
        <table class="table">
            <!-- Mostremos el nombre de las columnas, para nuestra comodidad y personalizción introduciremos lo datos manualmente -->
            <thead>
                <tr>
                    <th>id</th>
                    <th>Descripción</th>
                    <th>Modelo</th>
                    <th>Categoria</th>
                    <th class="text-end">Unidades</th>
                    <th class="text-end">Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <!-- Mostraremos el contenido de cada artículo -->
            <tbody>
                <?php foreach ($articulos as $articulo): ?>
                    <tr>
                        <th>
                            <?= $articulo['id'] ?>
                        </th>
                        <td>
                            <?= $articulo['descripcion'] ?>
                        </td>
                        <td>
                            <?= $articulo['modelo'] ?>
                        </td>
                        <td>
                            <?= $categorias[$articulo['categoria']] ?>
                        </td>
                        <td class="text-end">
                            <?= $articulo['unidades'] ?>
                        </td>
                        <td class="text-end">
                            <?= number_format($articulo['precio'], 2, ',', '.') ?> €
                        </td>
                        <td>
                            <!-- Botón eliminar -->
                            <a href="eliminar.php?=<?= $articulo['id'] ?>">
                                <i class="bi bi-trash-fill"></i>
                                <!-- Botón editar -->
                                <a href="editar.php?=<?= $articulo['id'] ?>">
                                    <i class="bi bi-pencil-square"></i>
                                    <!-- Botón mostrar -->
                                    <a href="mostrar.php?=<?= $articulo['id'] ?>">
                                        <i class="bi bi-tv"></i>

                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
            <!-- En el pie de la tabla, mostraremos el número de artículos mostrados -->
            <tfoot>
                <tr>
                    <td colspan="7"><b>Nº de Articulos: <?= count($articulos) ?></b></td>
                </tr>
            </tfoot>
        </table>

    </div>

    <!-- Pie de documento -->
    <?php include 'partials/footer.html' ?>


    <!-- js bootstrap 532-->
    <?php include 'layouts/javascript.html' ?>
</body>

</html>