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
            <i class="bi bi-calculator">Act 3.2 Mostar fecha</i>
            <span class="fs-6"></span>
        </header>

        <legend>Muestra la fecha</legend>
        

        <?php

        $mes=date('m');

        switch( $mes ) {
            case '01':
                $mes= 'Enero';
                break;
                case '02':
                    $mes= 'Febrero';
                    break;
                    case '03': 
                        $mes= 'Marzo';
                        break;
                        case '04':
                            $mes= 'Abril';
                            break;
                            case '05':
                                $mes= 'Mayo';
                                break;
                                case '06':
                                    $mes= 'Junio';
                                    break;
                                    case '07':
                                        $mes= 'Julio';
                                        break;
                                        case '08':
                                            $mes= 'Agosto';
                                            break;
                                            case '09':
                                                $mes= 'Septiembre';
                                                break;
                                                case '10':
                                                    $mes= 'Octubre';
                                                    break;
                                                    case '11':
                                                        $mes= 'Noviembre';
                                                        break;
                                                        case '12':
                                                            $mes= 'Diciembre';
                                                            break;
        }

        echo "El mes actual es " . $mes;
        
        
        ?>


            <!-- Pié del documento -->
            <?php include 'views/layouts/footer.html' ?>

    </div>

    <!-- javascript bootstrap 532 -->
    <?php include 'views/layouts/javascript.html' ?>
</body>

</html>