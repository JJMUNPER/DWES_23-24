<?php

//Cabecera(Hay que configurarla y es obligatoria)

$header = "Mime-Versión: 1.0". "\r\n";
$header .= "Content-Type: text/html; charset-iso-8859-1”.”\r\n";
$header .= "From: Juan Jesus <jjmunper@gmail.com>\n";
$header .= "X-Mailer: PHP/" . phpversion();

//Parametros

$destino = "juanjesusmunper@gmail.com"; //Correo electronico a quien se le enviara el mensaje   
$asunto = "Prueba de envio de correos"; //Asunto del mens
$mensaje = "<h2>Este es un mensaje en HTML, se puede hacer todo lo largo
que se quiera</h2>";

//Envio

if (mail($destino, $asunto, $mensaje, $header)) {
    echo "El mensaje ha sido enviado correctamente.";
} else {
    echo "ERROR. No se ha podido enviar el mensaje.";
}


?>