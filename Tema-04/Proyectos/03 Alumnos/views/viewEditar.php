<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'views/layouts/head.php' ?>
    <title>Proyecto 4.2 - Gestión de articulos</title>
</head>

<body>
    <!-- Capa principal -->
    <div class="container">
     

        <!-- cabecera documento -->
        <?php include 'partials/header.php' ?>
        <header class="pb-3 mb-4 border-bottom">
            <i class="bi bi-calculator"></i>
            <span class="fs-6">Proyecto 3.2 - Gestión de articulos</span>
        </header>

         <!-- Menú -->
         <?php include 'partials/menu_prin.php' ?>

        <legend>Formulario Edición Articulo</legend>

        <!-- Formulario Nuevo articulo -->
        <form action="update.php?indice=<?= $indice ?>" method="POST">
            <!-- id -->
            <div class="mb-3">
                <label for="descripcion" class="form-label">Id</label>
                <input type="text" class="form-control" name="id" value="<?= $articulo->getId() ?>" disabled>
                <!-- <div class="form-text">Introduzca identificador del articulo</div> -->
            </div>
            <!-- Descripcion -->
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripcion</label>
                <input type="text" class="form-control" name="descripcion" value="<?= $articulo->getDescripcion() ?>">
                <!-- <div class="form-text">Introduzca título articulo existente</div> -->
            </div>
            <!-- modelo -->
            <div class="mb-3">
                <label for="modelo" class="form-label">Modelo</label>
                <input type="text" class="form-control" name="modelo" value="<?= $articulo->getModelo() ?>">
                <!-- <div class="form-text">Introduzca modelo del articulo</div> -->
            </div>
            <!-- marca -->
            <div class="mb-3">
                <label class="form-label">Marca</label>
                <select class="form-select" aria-label="Default select example" name="marca">
                    <?php foreach ($marcas as $key => $marca) : ?>
                        <option value="<?= $key ?>" <?= ($articulo->getMarca() == $key) ? 'selected' : null ?>>
                            <?= $marca ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <!-- Unidades -->
            <div class="mb-3">
                <label class="form-label">Unidades</label>
                <input type="number" class="form-control" name="unidades" value="<?= $articulo->getUnidades(); ?>">
            </div>
            <!-- Precio -->
            <div class="mb-3">
                <label for="unidades" class="form-label">Stock</label>
                <input type="number" class="form-control" name="precio"  value="<?= $articulo->getPrecio() ?>">
                <!-- <div class="form-text">Introduzca Precio</div> -->
            </div>
            <!-- Género -->
            <div class="mb-3">
                <label class="form-label">Seleccionar Categorías</label>
                <div class="form-control">
                    <?php foreach ($categorias as $indice => $categoria) : ?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="<?= $indice ?>" name="categorias[]" <?= (in_array($indice, $articulo->getCategorias()) ? 'checked' : null) ?>>
                            <label class="form-check-label" for="">
                                <?= $categoria ?>
                                <label>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            
    


            <a class="btn btn-secondary" href="index.php" role="button">Cancelar</a>

            <button type="submit" class="btn btn-primary">Actualizar</button>

        </form>

        <br>
        <br>
        <br>




        <!-- Pié del documento -->
        <?php include'partials/footer.php'?>

    </div>

    <!-- javascript bootstrap 532 -->
    <?php include 'views/layouts/javascript.php' ?>
</body>

</html>