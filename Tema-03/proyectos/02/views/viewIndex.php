<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Usaremos una plantilla, que será usada para todos los proyectos -->
    <?php include 'layouts/head.html'?>
    <title>Proyecto 3.1 - Gestión de libros</title>

</head>
<body>
    <!-- Capa principal -->
    <div class="container">
        <!-- Cabecera -->
        <header class="pb-3 mb-4 border-bottom">
            <i class="bi bi-book-half"></i>
            <span class="fs-4">Proyecto 3.1 - Gestión de libros</span>
        </header>
        <legend>Tabla con los libros</legend>

        <table class="table table-light">
            <thead>
                <!-- Encabezado de la tabla -->
                <tr>
                    <?php
                        foreach (array_keys($libros[0]) as $clave): ?>
                            <th><?=ucfirst($clave) ?></th> <!-- Forma de convertir el primer caracter en mayuscula -->
                     <?php endforeach; ?>
                     <th>Acciones</th>
                </tr>
            </thead>            
            <tbdoy>
                <?php foreach($libros as $libro):?> <!-- Indexado -->
                    <tr>
                        <!-- Mismo formato a cada campo de la tabla -->
                        <?php foreach($libro as $campo): ?> <!-- Asociativo -->
                            <td>
                                <?= $campo ?>
                            </td>
                        <?php endforeach; ?>
                            <td>
                             <a href="eliminar.php?id=<?=$libro['id']?>">   
                            <i class="bi bi-trash"></i>
                            </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5"><b>Numero de libros: <?=count($libros)?></b></td>
                </tr>
            </tfoot>
        </table>
        <!-- Mostramos el contenido del array -->
        <?php  print_r($libros)?>
        

        <!-- Pie de documento -->
        <?php
            include 'layouts/footer.html';
        ?>
    </div>


    <!-- js bootstrap 532-->
    <?php
        include 'layouts/javascript.html';
    ?>
</body>
</html>