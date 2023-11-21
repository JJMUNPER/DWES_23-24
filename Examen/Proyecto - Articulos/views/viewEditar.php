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
        <legend>Formulario Editar Artículo</legend>

        <!-- Añadimos el menú -->
        <?php include 'partials/menu.php' ?>

       
         <!-- Formulario Nuevo Artículo -->
         <form action="update.php?id=<?=$idArticulo?>" method="POST">
         <div class="mb-3">
                <label class="form-label">id</label>
                <input type="number" class="form-control" name="id" value="<?=$articulo->getId()?>" readonly>
                <!-- <div class="form-text">Introduzca identificador del libro</div> -->
            </div>
            <!-- descripción -->
            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <input type="text" class="form-control" name="descripcion" value="<?=$articulo->getDescripcion()?>">
                <!-- <div class="form-text">Introduzca identificador del libro</div> -->
            </div>
            <!-- Modelo -->
            <div class="mb-3">
                <label for="titulo" class="form-label">Modelo</label>
                <input type="text" class="form-control" name="modelo" value="<?=$articulo->getModelo()?>">
                <!-- <div class="form-text">Introduzca título libro existente</div> -->
            </div>
            <!-- Marca -->
            <div class="mb-3">
                <label class="form-label">Marca</label>
               <select class="form-select" name="marcas">
                <?php foreach ($marcas as $key => $marca):?>
                    <option value="<?=$key?>"
                    <?=($articulo->getMarca() == $key)?'selected':null?>>
                    <?=$marca?>
                    </option> 
                <?php endforeach; ?>
               </select>
            </div>
            <!-- Unidades -->
            <div class="mb-3">
                <label class="form-label">Unidades</label>
                <input type="number" class="form-control" name="unidades" value="<?=$articulo->getUnidades()?>">
                <!-- <div class="form-text">Género del libro</div> -->
            </div>
            <!-- Precio -->
            <div class="mb-3">
                <label for="precio" class="form-label">Precio (€)</label>
                <input type="number" class="form-control" name="precio" step="0.01" value="<?=$articulo->getPrecio()?>">
                <!-- <div class="form-text">Introduzca Precio</div> -->
            </div>
             <!-- Categoría -->
             <div class="mb-3">
                <label for="" class="form-label">Categorias</label>
                <div class="form-control">
                    <?php foreach($categorias as $key => $categoria):?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="<?=$key?>" name="categorias[]"
                            <?=(in_array($key,$articulo->getCategorias()))?'checked':null?>/>
                            <label class="form-check-label">
                                <?=$categoria?>
                            </label>
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

    </div>
    <!-- Pie de documento -->
     <?php include 'partials/footer.php' ?>


    <!-- js bootstrap 532-->
    <?php include 'layouts/javascript.php' ?>
</body>

</html>