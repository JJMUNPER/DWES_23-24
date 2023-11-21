<!doctype html>
<html lang="es">

<head>
  <!-- Incluimos layout.head.php -->
  <?php include 'layouts/head.php' ?>

  <title>Home - CRUD Tabla Películas</title>
</head>

<body>
  <div class="container">

    <!-- Cabecera -->
    <!-- Incluimos partial.cabecera.php -->
    <?php include 'partials/header.php' ?>


    <legend>
      Tabla Películas
    </legend>

    <!-- Incluimos Partials menu -->
    <!-- Incluimos partial.menu.php -->
    <?php include 'partials/partial.menu.php' ?>

    <!-- Aqui le metemos la notificacion si la pide -->

    <!-- Generamos la tabla de libros -->
    <table class="table">
      <!-- Generamos el encabezado de la tabla películas -->
      <thead>
        <tr>
          <th>Id</th>
          <th>Titutolo</th>
          <th>Pais</th>
          <th>Directori</th>
          <th>Generos</th>
          <th>Año</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <!-- Mostramos los detalles de las películas -->
        <!-- Muestro los datos de la película -->
        <tr>
          <?php foreach ($peliculas->getPeliculas() as $indice => $pelicula) : ?>
        <tr>
          <td><?= $pelicula['id'] ?></td>
          <td><?= $pelicula['titulo'] ?></td>
          <td><?= $paises[$pelicula['pais']] ?></td>
          <td><?= $pelicula['director'] ?></td>
          <td>
            <?php
            $generosAsociados = mostrarGeneros($generos, $pelicula['generos']);
            echo implode(', ', $generosAsociados);
            ?>
          </td>
          <td><?= $pelicula['año'] ?></td>


          <!-- Muestro los botones de acción -->
          <td>
            <a href="eliminar.php?indice=<?= $indice ?>" Title="Eliminar"><i class="bi bi-trash-fill"></i></a>
            <a href="editar.php?indice=<?= $indice ?>" Title="Modificar"><i class="bi bi-pencil-square"></i></a>
            <a href="mostrar.php?indice=<?= $indice ?>" Title="Mostrar"><i class="bi bi-eye"></i></a>
          </td>

        <?php endforeach; ?>
        <!-- Fin botones de acción -->

        </tr>
      <tfoot>
        <tr>
          <td colspan="7">Número Registros: <?= count($peliculas) ?></td>
        </tr>
      </tfoot>

      </tbody>
    </table>

    <!-- Incluimos Partials footer -->
    <!-- Incluimos partial.footer.php -->
    <?php include 'views/partials/partial.footer.php' ?>

  </div>

  <!-- Incluimos Partials javascript bootstrap -->
  <!-- Incluimos layout.javascript.php -->
  <?php include 'views/layouts/layout.javascript.php' ?>

</body>

</html>