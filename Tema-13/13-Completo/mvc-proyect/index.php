<?php
#### Librerías
require_once 'libs/database.php';
require_once 'libs/controller.php';
require_once 'libs/model.php';
require_once 'libs/view.php';
#### Clases
require_once 'class/class.cliente.php';
require_once 'class/class.cuenta.php';
require_once 'class/class.contacto.php';
require_once 'class/class.movimiento.php';
require_once 'class/class.user.php';
#### Controladores
require_once "libs/lib.php";
require_once 'libs/app.php';
#### Configuración
require_once 'config/config.php';
require_once 'config/privileges.php';

$app = new App();
