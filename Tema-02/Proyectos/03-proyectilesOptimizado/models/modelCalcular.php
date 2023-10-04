<?php


    // Para hacer los calculos

    define("G", 9.81);

    $velocidad= $_POST['velocidad'];
    $angulo= $_POST['angulo'];

    $anguloradianes= deg2rad($angulo);

    $velocidadinicialhorizontal=$velocidad*cos($anguloradianes);

    $velocidadinicialvertical= $velocidad*sin($anguloradianes);

    $alcancemaximo=(($velocidad*$velocidad)*sin(2*$anguloradianes))/(G);

    $alturamaxima=pow($velocidad,2)*pow(sin($anguloradianes),2)/(2*G);

    $tiempovuelo= 2 * ($velocidadinicialvertical/G);



    #Redondeo

    $anguloradianesf= number_format($anguloradianes,5,",",".");

    $velocidadinicialhorizontalf= number_format($velocidadinicialhorizontal,2,",",".");

    $velocidadinicialverticalf= number_format($velocidadinicialvertical,2,",",".");

    $alcancemaximof= number_format($alcancemaximo,2,",",".");

    $alturamaximaf= number_format($alturamaxima,2,",",".");

    $tiempovuelof=number_format($tiempovuelo,2,",",".");



?>