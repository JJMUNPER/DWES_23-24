<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Incluir head -->
    <title>Formulario de acceso</title>
    <?php include 'views/layouts/head.html' ?>
</head>

<body>
    <!-- Capa principal -->
    <div class="container">

        <!-- cabecera documento -->
        <header class="pb-3 mb-4 border-bottom">
            <i class="bi bi-calculator">Act 3.2 Tabla de 100 valores</i>
            <span class="fs-6"></span>
        </header>

        <legend>Numeros del 1 al 100</legend>


        <!-- Valores para los campos -->
        <div class="table-responsive">
            <table class="table table-striped
        table-hover	
        table-borderless
        table-primary
        align-middle">
                <thead class="table-light">
                    <tr>
                        <th>1 al 10</th>
                        <th>11 al 20</th>
                        <th>21 al 30</th>
                        <th>31 al 40</th>
                        <th>41 al 50</th>
                        <th>51 al 60</th>
                        <th>61 al 70</th>
                        <th>71 al 80</th>
                        <th>81 al 90</th>
                        <th>91 al 100</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">


                    <?php while ($i <= 10): ?>
                        <tr class="table-primary">
                            <td>
                                <?= $i ?>
                            </td>
                            <td>
                                <?= $i + 10 ?>
                            </td>
                            <td>
                                <?= $i + 20 ?>
                            </td>
                            <td>
                                <?= $i + 30 ?>
                            </td>
                            <td>
                                <?= $i + 40 ?>
                            </td>
                            <td>
                                <?= $i + 50 ?>
                            </td>
                            <td >
                                <?= $i + 60 ?>
                            </td>
                            <td>
                                <?= $i + 70 ?>
                            </td>
                            <td>
                                <?= $i + 80 ?>
                            </td>
                            <td>
                                <?= $i + 90 ?>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endwhile; ?>


                </tbody>
        

                </tfoot>
            </table>
        </div>





        <!-- Pié del documento -->
        <?php include 'views/layouts/footer.html' ?>

    </div>

    <!-- javascript bootstrap 532 -->
    <?php include 'views/layouts/javascript.html' ?>
</body>

</html>