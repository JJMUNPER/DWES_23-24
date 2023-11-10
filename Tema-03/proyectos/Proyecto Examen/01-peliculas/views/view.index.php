<!doctype html>
<html lang="es">
  <head>
    <!-- Incluimos layout.head.php -->
    <?php include("layouts/layout.head.php") ?>
    <title>Home - CRUD Tabla Películas</title>
  </head>
  
  <body>
    <div class="container">
      
      <!-- Cabecera -->
      <?php include("partials/partial.cabecera.php"); ?>
      <!-- Incluimos partial.cabecera.php -->

      <legend>
        Tabla Películas
      </legend>

      <!-- Incluimos Partials menu -->
      <?php include("partials/partial.menu.php") ?>
      <!-- Incluimos partial.menu.php -->

      <!-- Generamos la tabla de libros -->
      <table class="table">
        <!-- Generamos el encabezado de la tabla películas -->
        <thead>
        <tr>
          <?php
          $claves = array_keys($peliculas[0]);
          $claves[] = "Acciones";
          foreach ($claves as $clave): ?>
            <th>
              <?=($clave) ?>
            </th>
          <?php endforeach; ?>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($peliculas as $indice => $pelicula): ?>
          <tr>
            <?php foreach ($pelicula as $key => $campo): ?>
              <td>
                <?php if ($key == 'generos'): ?>
                  <?= implode(', ', mostrarGeneros($generos, $campo)) ?>
                  <?php elseif ($key == 'nacionalidad'): ?>
                    <?= implode(mostrarPais($paises, $campo)) ?>
                <?php else: ?>
                  <?= $campo ?>
                <?php endif ?>
              </td>
            <?php endforeach; ?>
          
            
              <!-- Muestro los botones de acción -->
              <td>
                <a href="#" Title="Eliminar"><i class="bi bi-trash-fill"></i></a>
                <a href="#" Title="Modificar"><i class="bi bi-pencil-square"></i></a>
                <a href="mostrar.php?indice=<?= $indice ?>" Title="Mostrar"><i class="bi bi-eye"></i></a>
              </td>
            <!-- Fin botones de acción -->
            
            </tr>
          <?php endforeach; ?>
          <tfoot>
            <tr>
              <td colspan="7">Número Registros: <?= count($peliculas) ?></td>
            </tr>
          </tfoot>
          
        </tbody>
      </table>
      
      <!-- Incluimos Partials footer -->
      <?php include("partials/partial.footer.php") ?>
      <!-- Incluimos partial.footer.php -->
      
    </div>

    <!-- Incluimos Partials javascript bootstrap -->

    <!-- Incluimos layout.javascript.php -->
    <?php include("layouts/layout.javascript.php") ?>

  </body>
</html>