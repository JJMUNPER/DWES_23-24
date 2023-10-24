<!DOCTYPE html>
<html lang="es">

<head>
    <?php include "partials/header.php"  ?>
    <title>Articulos Proyecto</title>

</head>

<body>

    <div class="container">
        <?php include "partials/header.php" ?>

        <legend>Formulario Actualizar</legend>

        <form action="update.php?key=<?= $indice ?>" method=POST>

            <div class="mb-3">

                <label for="" class="form-label">ID</label>
                <input type="text" class="form-control" name="id" value="<?= $articulos["id"] ?>">
            </div>
            <div class="mb-3">

                <label for="" class="form-label">Descripción</label>
                <input type="text" class="form-control" name="descripcion" value="<?= $articulos["descripcion"] ?>">
            </div>

            <div class="mb-3">

                <label for="" class="form-label">Modelo</label>
                <input type="text" class="form-control" name="modelo" id="" value="<?= $articulos["modelo"] ?>">
            </div>

            <div class="mb-3">

                <label for="" class="form-label">Categorias</label>

                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="categoria">

                    <?php foreach ($categorias as $key => $categoria) : ?>

                        <option value="<?= $key ?>" <?= ($articulos["categoria"] == $key) ? 'selected' : null ?>>
                            <?= $categoria ?>
                        </option>

                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">

                <label for="" class="form-label">Unidades</label>
                <input type="text" class="form-control" name="unidades" id="" value="<?= $articulos["unidades"] ?>">
            </div>

            <div class="mb-3">

                <label for="" class="form-label">Precio</label>
                <input type="text" class="form-control" name="precio" id="" value="<?= $articulos["precio"] ?>">
                </div>
                <button type="submit" class="btn btn-primary"> Actualizar </button>
                <a name="" id="" class="btn btn-secondary" href="index.php" role="button">Cancelar</a>

        </form>

    </div>

<br>
<br>
<br>
    <!-- footer -->
    <?php include "partials/footer.html" ?>


    <!-- Bootstrap JS y popper -->
    <?php include "layouts/javascript.html" ?>
</body>

</html>