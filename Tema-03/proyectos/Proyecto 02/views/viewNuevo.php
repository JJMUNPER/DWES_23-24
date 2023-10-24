<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("partials/header.php");  ?>
    <title>Articulos Proyecto</title>

</head>

<body>

    <div class="container">
        <?php include "partials/header.php" ?>

        <legend>Formulario Nuevo</legend>
        <div class="mb-3">
            <form action="nuevo.php" method=POST>
                
                <div class="mb-3">

                    <label for="" class="form-label">Descripción</label>
                    <input type="text" class="form-control" name="descripcion">
                </div>
                <div class="mb-3">

                    <label for="" class="form-label">Modelo</label>
                    <input type="text" class="form-control" name="modelo" id="">
                </div>

                <div class="mb-3">

                    <label for="" class="form-label">Categorias</label>

                    <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="categoria">

                        <option selected disabled>Seleccione una categoria</option>

                        <?php foreach ($categorias as $key => $categoria) : ?>

                            <option value="<?= $key ?>"> <?= $categoria ?> </option>

                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">

                    <label for="" class="form-label">Unidades</label>
                    <input type="text" class="form-control" name="unidades" id="">
                </div>
                <div class="mb-3">

                    <label for="" class="form-label">Precio</label>
                    <input type="text" class="form-control" name="precio">
                </div>
                <div class="mb-3">

                    <button type="submit" class="btn btn-primary">Crear </button>
                    <a name="" id="" class="btn btn-secondary" href="index.php" role="button">Cancelar</a>
                </div>

            </form>
        </div>

    </div>

    <br><br><br>

    <!-- footer -->
    <?php include "partials/footer.html" ?>


    <!-- Bootstrap JS y popper -->
    <?php include "layouts/javascript.html" ?>
</body>

</html>