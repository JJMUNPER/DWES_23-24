<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once 'views/layouts/head.html' ?>
</head>

<body>
    <!-- Capa principal -->
    <div class="container">
        <!-- Cabecera -->
        <?php require_once 'views/partials/header.html' ?>
        <legend>Formulario editar articulo</legend>

        <!-- Añadimos el menú -->
        <?php require_once 'views/partials/menu.php' ?>

       
         <!-- Formulario Nuevo Artículo -->
         <form action="update.php?key=<?=$indice?>" method="POST">
            <!-- descripción -->
            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <input type="text" class="form-control" name="descripcion">
                <!-- <div class="form-text">Introduzca identificador del libro</div> -->
            </div>
            <!-- Modelo -->
            <div class="mb-3">
                <label for="titulo" class="form-label">Modelo</label>
                <input type="text" class="form-control" name="modelo">
                <!-- <div class="form-text">Introduzca título libro existente</div> -->
            </div>
            <!-- Categoría -->
            <!-- Se generan las categorias de forma dinamica -->
            <div class="mb-3">
                <label class="form-label">Categoría</label>
                <select class="form-select" aria-label="Default select example" name="categorias">
                    <option selected disabled>Selecciona una categoría:</option>
                    <?php foreach($categorias as $key => $categoria): ?>
                        <option value="<?=$key?>"><?=$categoria?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <!-- Unidades -->
            <div class="mb-3">
                <label class="form-label">Unidades</label>
                <input type="number" class="form-control" name="unidades">
                <!-- <div class="form-text">Género del libro</div> -->
            </div>
            <!-- Precio -->
            <div class="mb-3">
                <label for="precio" class="form-label">Precio (€)</label>
                <input type="number" class="form-control" name="precio" step="0.01">
                <!-- <div class="form-text">Introduzca Precio</div> -->
            </div>


            <a class="btn btn-secondary" href="index.php" role="button">Cancelar</a>
            <button type="reset" class="btn btn-danger">Borrar</button>
            <button type="submit" class="btn btn-primary">Añadir</button>

        </form>
        

    </div>
    <!-- Pie de documento -->
     <?php require_once 'views/partials/footer.html' ?>


    <!-- js bootstrap 532-->
    <?php require_once 'views/layouts/javascript.html' ?>
</body>

</html>