<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Proyecto 2.2 - Lanzamiento Proyectiles</title>

    <!-- Bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Bootstrap Icons 1.11.1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
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
    <footer class="footer mt-auto py-3 fixed-bottom bg-light">
        <div class="container">
            <span class="text-muted">
                © 2023 Juan Jesus Muñoz Perez - DWES - 2ºDAW - Curso 23/24</span>
        </div>
    </footer>

     <!-- Bootstrap Javascript y popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>