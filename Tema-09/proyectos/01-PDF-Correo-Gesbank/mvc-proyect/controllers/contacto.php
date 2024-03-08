<?php

// Incluir clases necesarias para el envío de correos electrónicos y manejo de contactos
require_once 'class/class.contacto.php';
require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';

// Incluir archivo de autenticación
require 'auth.php';

// Utilizar clases PHPMailer para el envío de correos electrónicos
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Clase Contacto que extiende de Controller
class Contacto extends Controller
{
    // Constructor de la clase
    function __construct()
    {
        parent::__construct();
    }

    // Función para renderizar la vista de contacto
    function render()
    {
        $this->view->render('contacto/index');
    }

    // Función para validar y enviar el formulario de contacto
    function validar()
    {
        // Iniciar sesión para acceder a las variables de sesión
        session_start();

        // Crear un nuevo objeto de contacto vacío
        $this->view->contacto = new classContacto();

        // Verificar si se está regresando de un registro no validado
        if (isset($_SESSION['error']))
        {
            // Mostrar mensaje de error
            $this->view->error = $_SESSION['error'];

            // Rellenar el formulario con los detalles del contacto
            $this->view->contacto = unserialize($_SESSION['contacto']);

            // Recuperar array de errores específicos
            $this->view->errores = $_SESSION['errores'];

            // Limpiar variables de sesión
            unset($_SESSION['error']);
            unset($_SESSION['errores']);
            unset($_SESSION['contacto']);
        }

        // Sanear los datos del formulario para evitar inyecciones y otros problemas de seguridad
        $nombre = filter_var($_POST['nombre'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);
        $asunto = filter_var($_POST['asunto'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);
        $textoMensaje = filter_var($_POST['textoMensaje'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);

        // Crear un nuevo objeto de contacto con los datos saneados
        $contacto = new classContacto($nombre, $email, $asunto, $textoMensaje);

        // Validar campos obligatorios
        $errores = [];
        if (empty($nombre)) $errores['nombre'] = 'El campo nombre es obligatorio';
        if (empty($email)) $errores['email'] = 'El campo email es obligatorio';
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errores['email'] = 'Formato email incorrecto';
        if (empty($asunto)) $errores['asunto'] = 'El campo asunto es obligatorio';
        if (empty($textoMensaje)) $errores['textoMensaje'] = 'El campo mensaje es obligatorio';

        // Si hay errores, redirigir al usuario al formulario con los mensajes de error
        if (!empty($errores)) {
            $_SESSION['errores'] = $errores;
            header('Location:' . URL . 'contacto');
            exit();
        } else {
            try {
                // Configurar PHPMailer para enviar correos electrónicos
                $mail = new PHPMailer(true);
                $mail->CharSet = "UTF-8";
                $mail->Encoding = "quoted-printable";
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = SMTP_USER; // Configurar con la dirección de correo SMTP
                $mail->Password = SMTP_PASS; // Configurar con la contraseña SMTP
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                // Configurar destinatario, remitente, asunto y mensaje del correo
                $destinatario = SMTP_USER; // Cambiar por el correo del destinatario
                $remitente = $email;
                $asuntoMail = $asunto;
                $mensajeMail = $textoMensaje;

                $mail->setFrom($remitente, $nombre);
                $mail->addAddress($destinatario);
                $mail->addReplyTo($remitente, $nombre);
                $mail->isHTML(true);
                $mail->Subject = $asuntoMail;
                $mail->Body = $mensajeMail;

                // Desactivar la verificación del certificado SSL de SMTP en PHPMailer
                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );

                // Enviar correo electrónico
                $mail->send();

                // Redirigir al usuario a la página de éxito
                $_SESSION['mensaje'] = 'Mensaje enviado correctamente.';
                header('Location:' . URL);
                exit();
            } catch (Exception $e) {
                // Manejar excepciones al enviar el correo
                $_SESSION['error'] = 'Error al enviar el mensaje: ' . $e->getMessage();
                header('Location:' . URL . 'contacto');
                exit();
            }
        }
    }
}
