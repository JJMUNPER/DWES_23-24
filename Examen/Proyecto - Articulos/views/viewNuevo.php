<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'layouts/head.php' ?>
</head>

<body>
    <!-- Capa principal -->
    <div class="container">
        <!-- Cabecera -->
        <?php include 'partials/header.php' ?>
        <legend>Formulario Añadir Artículo</legend>

        <!-- Añadimos el menú -->
        <?php include 'partials/menu.php' ?>

       
         <!-- Formulario Nuevo Artículo -->
         <form action="create.php" method="POST">
            <!-- id -->
            <div class="mb-3">
                <label class="form-label">id</label>
                <input type="number" class="form-control" name="id">
                <!-- <div class="form-text">Introduzca identificador del libro</div> -->
            </div>
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
            <!-- Marca -->
            <div class="mb-3">
                <label for="titulo" class="form-label">Marca</label>
                <select name="marca" class="form-select">
                    <option selected disabled>Selecciona una marca</option>
                    <?php foreach($marcas as $key => $marca): ?>
                    <option value="<?=$key?>"><?=$marca?></option>
                    <?php endforeach; ?>
                </select>
                <!-- <div class="form-text">Introduzca título libro existente</div> -->
            </div>
            <!-- Categoría -->
            <div class="mb-3">
                <label for="" class="form-label">Categorias</label>
                <div class="form-control">
                    <?php foreach($categorias as $key => $categoria):?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="<?=$key?>" name="categorias[]"/>
                            <label class="form-check-label">
                                <?=$categoria?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>
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
            <div class="mb-3">
                <a class="btn btn-secondary" href="index.php" role="button">Cancelar</a>
                <button type="reset" class="btn btn-danger">Borrar</button>
                <button type="submit" class="btn btn-primary">Añadir</button>
            </div>
            
        </form>
        

    </div>
    <br>
    <br>
    <br>
    <!-- Pie de documento -->
     <?php include 'partials/footer.php' ?>


    <!-- js bootstrap 532-->
    <?php include 'layouts/javascript.php' ?>
</body>

</html>