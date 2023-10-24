<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Head -->
    <?php include 'partials/header.php' ?>
    <title>Proyecto 3.2- Gestion Articulos</title>
</head>

<body>
    <div class="container" style="padding-top:10%;">

        <!-- Menu principal -->

        <?php include 'partials/menu_prin.php' ?>


        <table class="table" style="border:solid">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Descripción</th>
                    <th>Modelo</th>
                    <th>Categorías</th>
                    <th class="text-end">Stock</th>
                    <th class="text-end">precio</th>
                    <th>Acciones</th>

                </tr>
            </thead>

            <!-- Mostramos cuerpo de la tabla -->

            <tbody>
                <?php foreach ($articulos as $articulo): ?>

                    <tr>
                        <!-- Formatos distintos para cada columna -->

                        <!-- Detalles del articulos -->
                        <td>
                            <?= $articulo['id'] ?>
                        </td>
                        <td>
                            <?= $articulo['descripcion'] ?>
                        </td>
                        <td>
                            <?= $articulo['modelo'] ?>
                        </td>
                        <td>
                            <?= $categorias[$articulo['categoria']] ?>
                        </td>
                        <td>
                            <?= $articulo['unidades'] ?>
                        </td>
                        <td>
                            <?= number_format($articulo['precio'], 2, ',', '.') ?> €
                        </td>

                        <!-- botones de acción -->

                        <td>
                            <a href="eliminar.php?key=<?= $indice ?>"><i class="bi bi-trash"></i></a>
                            <a href="editar.php?key=<?= $indice ?>"> <i class="bi bi-pencil"></i> </a>
                            <a href="mostrar.php?key=<?= $indice ?>"> <i class="bi bi-eye"></i> </a>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="7"></td>
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