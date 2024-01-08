<!DOCTYPE html>
<html lang="es">

<head>
    <!-- loyout.head -->
    <?php include 'views/layouts/layout.head.html'?>
    <title>Nuevo - Gestión Libros </title>
</head>

<body>
    <!-- Capa Principal -->
    <div class="container">
        <!-- partial.header -->
        <?php  include 'views/partials/partial.header.php'?>
        <legend>Formulario Nuevo Libro</legend>

        <form action="update.php?id=<?=$libro->id?>" method='POST'>
            <!-- título -->
            <div class="mb-3">
                <label for="titulo" class="form-label">Titulo</label>
                <input type="text" class="form-control" name="titulo">
            </div>

            <!-- isbn -->
            <div class="mb-3">
                <label for="isbn" class="form-label">ISBN</label>
                <input type="text" class="form-control" name="isbn">
            </div>

            <!-- fecha_edicion -->
            <div class="mb-3">
                <label for="fecha_edicion" class="form-label">Edicion</label>
                <input type="date" class="form-control" name="fecha_edicion">
            </div>

            <!-- autor -->
            <div class="mb-3">
                <label for="" class="form-label">Autor</label>
                <select class="form-select">
                    <option selected disabled>Seleccione Autor</option>
                    <?php foreach ($libros as $data) : ?>
                        <option value="<?= $data->id ?>" <?= ($data->id == $libros->id)? 'selected': null ?>>
                            <?= $data->libro ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Editorial -->
            <div class="mb-3">
                <label for="" class="form-label"></label>
                <select class="form-select">
                    <option selected disabled>Seleccione Editorial</option>
                    <?php foreach ($libros as $data) : ?>
                        <option value="<?= $data->id ?>" <?= ($data->id == $libros->id)? 'selected': null ?>>
                            <?= $data->libro ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- stock -->
            <div class="mb-3">
                <label for="" class="form-label">Stock</label>
                <input type="number" class="form-control" aria-describedby="emailHelpId" value=0 name="stock">
            </div>

            <!-- precio_coste -->
            <div class="mb-3">
                <label for="" class="form-label">Precio Coste</label>
                <input type="number" class="form-control" aria-describedby="emailHelpId" step="0.01" value=0.00 name="precio_coste">
            </div>

            <!-- precio_venta -->
            <div class="mb-3">
                <label for="" class="form-label">Precio Venta</label>
                <input type="number" class="form-control" aria-describedby="emailHelpId" step="0.01" value=0.00 name="precio_venta">
            </div>


            <!-- Botones de acción -->
            <a class="btn btn-secondary" href="index.php" role="button">Cancelar</a>
            <button type="reset" class="btn btn-danger">Borrar</button>
            <button type="submit" class="btn btn-primary">Enviar</button>

        </form>

        <br><br><br>

        <!-- partial.footer -->
        <?php include 'views/partials/partial.footer.html'?>

        <!-- layout.javascript -->
        <?php include 'views/layouts/layout.javascript.html'?>

</body>

</html>