<!doctype html>
<html lang="es">
  <head>

    <?php include 'views/plantilla/head.html' ?>
    
    <title>Proyecto 2.2 - Lanzamiento Proyectiles</title>

  </head>
  <body>
    <!-- Capa Principal -->
    <div class="container">

        <header class="pb-3 mb-4 border-bottom">
            <!-- Icon -->
            <i class="bi bi-airplane-engines"></i>>        
            <span class="fs-3">Proyecto 2.2 - Lanzamiento Proyectiles</span>
        </header>

        <table class="table table-striped">
            <tr>
                <th>Valores iniciales:</th>
                <td></td>
            </tr>
            <tr>
                <td>Velocidad Inicial</td>
                <td><?=$velocidad ?> m/s</td>
            </tr>
            <tr>
                <td>Angulo de Inclinacion</td>
                <td><?=$angulo ?> º</td>
            </tr>
            <tr>
                <th>Resultados:</th>
                <td></td>
            </tr>
            <tr>
                <td>Ángulo en Radianes</td>
                <td><?=$anguloradianesf ?> Radianes</td>
            </tr>
            <tr>
                <td> Velocidad Inicial Horizontal X</td>
                <td><?=$velocidadinicialhorizontalf ?> m/s</td>
            </tr>
            <tr>
                <td>Velocidad Inicial Vertical Y</td>
                <td><?=$velocidadinicialverticalf ?> m/s</td>
            </tr>
            
            <tr>
                <td>El alcance máximo del proyectil </td>
                <td><?=$alcancemaximof ?> m</td>
            </tr>
            <tr>
                <td>Tiempo de vuelo del proyectil</td>
                <td><?=$tiempovuelof ?> s</td>
            </tr>

            <tr>
                <td>Altura máxima del proyectil </td>
                <td><?=$alturamaximaf ?> m</td>
            </tr>

           
        </table>

        <a class="btn btn-outline-secondary" href="index.php" role="button">Volver</a>
    </div>


    
    <!-- Pie del documento -->
    <?php include 'views/plantilla/footer.html' ?>

     <!-- Bootstrap Javascript y popper -->
     <?php include 'views/plantilla/javascript.html' ?>
      </body>
</html>