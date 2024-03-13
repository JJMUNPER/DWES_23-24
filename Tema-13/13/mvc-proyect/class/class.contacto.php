<?php

//No respeta la propiedad de encapsulamiento, por lo que se puede acceder a los atributos sin problemas

class classContacto {
    public $nombre;
    public $email;
    public $asunto;
    public $textoMensaje;

    function __construct(

        $nombre = null,
        $email = null,
        $asunto = null,
        $textoMensaje = null,


    ) {

        $this->nombre = $nombre;
        $this->email = $email;
        $this->asunto = $asunto;
        $this->textoMensaje = $textoMensaje;
    }
}




?>