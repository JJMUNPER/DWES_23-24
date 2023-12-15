
<!doctype html>
<html lang="es"> 

<!-- Head -->
<?php require_once("template/partials/head.php") ?>

<body>
	
    
    <!-- Page Content -->
    <div class="container">
	<!-- Cabecera -->
    <?php require_once("template/partials/header.php") ?>

	<!-- Mensajes -->
		<?php require_once("template/partials/mensaje.php") ?>

		<!-- Errores -->
		<?php require_once("template/partials/error.php") ?>
		

		<!-- Estilo card de bootstrap -->
		<div class="card">
			<div class="card-header">
				Tabla de alumnos
			</div>
			<div class="card-body">
				<!--  -->
				
			<table class="table">
            <!-- Mostremos el nombre de las columnas, para nuestra comodidad y personalizción introduciremos lo datos manualmente -->
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Poblacion</th>
                    <th scope="col">DNI</th>
                    <th scope="col" class="text-end">Edad</th>
                    <th scope="col">Curso</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <!-- Mostraremos el contenido de cada artículo -->
            <tbody>
                <?php foreach($this->$alumnos as $alumno) : ?>
                    <tr>
                        <th>
                            <?= $alumno['id'] ?>
                        </th>
                        <td>
                            <?= $alumno['nombre'] ?>
                        </td>
                        <td>
                            <?= $alumno['email'] ?>
                        </td>
                        <td>
                            <?= $alumno['telefono'] ?>
                        </td>
                        <td>
                            <?=$alumno['poblacion']?>
                        </td>
                        <td>
                            <?= $alumno['dni'] ?>
                        </td>
                        <td class="text-end">
                            <?= $alumno['edad'] ?>
                        </td>
                        <td>
                            <?= $alumno['curso'] ?>
                        </td>
                        <td>
                            <!-- Botón eliminar -->
                            <a href="eliminar.php?indice=<?= $alumno['id'] ?>" title="Eliminar">
                                <i class="bi bi-trash-fill"></i>
                            </a>

                            <!-- Botón editar -->
                            <a href="editar.php?indice=<?= $alumno['id'] ?>" title="Editar">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <!-- Botón mostrar -->
                            <a href="mostrar.php?indice=<?=$alumno['id']?>" title="Mostrar">
                                <i class="bi bi-tv"></i>
                            </a>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
            <!-- En el pie de la tabla, mostraremos el número de artículos mostrados -->
            <tfoot>
              

			</div>
		</div>

		<div class="card-footer">
			<small class="text-muted">Nº Alumnos:
			<?= $this->$alumnos->rowCount(); ?>
			</small>
		</div>

    </div>

    <!-- /.container -->
    
    <?php require_once("template/partials/footer.php") ?>
	<?php require_once("template/partials/javascript.php") ?>
	
</body>

</html>