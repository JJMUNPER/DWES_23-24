<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'views/partials/header.php' ?>
    <?php include 'views/layouts/head.php' ?>
    <!-- Incluir head -->
    <title><h1>Formulario</h1></title>
</head>

<body>
    <!-- Capa principal -->
    <div class="container">

        <!-- cabecera documento -->
        <header class="pb-3 mb-4 border-bottom">
            <i class="bi bi-book"></i>Tabla de Libros
            <span class="fs-6"></span>
        </header>

        <legend>Formulario mostrar artículo</legend>

        <form method="POST" action="mostrar.php?id=<?= $id ?>">
            <div class="mb-3">
                <label class="form-label">ID</label>
                <input type="number" name="id" class="form-control" value="<?= $articulo['id'] ?>" readonly>

            </div>
            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <input type="text" name="descripcion" class="form-control" value="<?= $articulo['descripcion'] ?>"
                    readonly>

            </div>
            <div class="mb-3">
                <labelclass="form-label">Modelo</label>
                    <input type="text" name="modelo" class="form-control" value="<?= $articulo['modelo'] ?>" readonly>

            </div>
            <div class="mb-3">
                <label class="form-label">Categoría</label>
                <input type="text" name="categoria" class="form-control" value="<?= $articulo['categoria'] ?>" readonly>

            </div>

            <div class="mb-3">
                <label class="form-label">Unidades</label>
                <input type="number" name="unidades" class="form-control" value="<?= $articulo['unidades'] ?>" readonly>

            </div>
            <div class="mb-3">
                <label class="form-label">Precio (€)</label>
                <input type="number" step="any" name="precio" class="form-control" value="<?= $articulo['precio'] ?>"
                    readonly>

            </div>
            <a class="btn btn-secondary" role="button" href="index.php">Volver</a>
        </form>

        <!-- Pié del documento -->
        <?php include 'views/partials/footer.php' ?>

    </div>

    <!-- javascript bootstrap 532 -->
    <?php include 'views/layouts/javascript.php' ?>
</body>

</html>