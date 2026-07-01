<?php
// Handler del formulario de contacto -> envia por SMTP (Gmail) a contactoalmatriz@gmail.com
declare(strict_types=1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

header('Content-Type: application/json; charset=utf-8');

function respond(int $code, array $payload): void {
    http_response_code($code);
    echo json_encode($payload, JSON_UNESCAPED_UNICODE);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    respond(405, ['ok' => false, 'error' => 'Metodo no permitido.']);
}

// Honeypot anti-spam: si el campo oculto viene lleno, es un bot.
if (!empty($_POST['website'] ?? '')) {
    respond(200, ['ok' => true]); // fingir exito sin enviar
}

$name    = trim($_POST['name'] ?? '');
$email   = trim($_POST['email'] ?? '');
$subject = trim($_POST['subject'] ?? '');
$message = trim($_POST['message'] ?? '');

if ($name === '' || $email === '' || $message === '') {
    respond(422, ['ok' => false, 'error' => 'Completa nombre, email y mensaje.']);
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    respond(422, ['ok' => false, 'error' => 'El email no es valido.']);
}
if ($subject === '') {
    $subject = 'Consulta desde escuela-almatriz.com';
}

// La config con credenciales vive FUERA del webroot: /home/<user>/private/mail-config.php
// (un nivel arriba de public_html). Se puede sobreescribir con la env var MAIL_CONFIG_PATH.
$configPath = getenv('MAIL_CONFIG_PATH') ?: dirname(__DIR__) . '/private/mail-config.php';
if (!is_file($configPath)) {
    error_log('Contacto Almatriz - falta mail-config.php en ' . $configPath);
    respond(500, ['ok' => false, 'error' => 'El formulario no esta configurado aun. Escribenos por WhatsApp.']);
}
$config = require $configPath;

require __DIR__ . '/php/PHPMailer/Exception.php';
require __DIR__ . '/php/PHPMailer/PHPMailer.php';
require __DIR__ . '/php/PHPMailer/SMTP.php';

$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host       = $config['SMTP_HOST'];
    $mail->SMTPAuth   = true;
    $mail->Username   = $config['SMTP_USER'];
    $mail->Password   = $config['SMTP_PASS'];
    $mail->SMTPSecure = $config['SMTP_SECURE'];
    $mail->Port       = (int) $config['SMTP_PORT'];
    $mail->CharSet    = 'UTF-8';

    $mail->setFrom($config['MAIL_FROM'], $config['MAIL_FROM_NAME']);
    $mail->addAddress($config['MAIL_TO'], $config['MAIL_TO_NAME']);
    $mail->addReplyTo($email, $name);

    $mail->Subject = $subject;
    $mail->Body =
        "Nombre: {$name}\n" .
        "Email: {$email}\n" .
        "Asunto: {$subject}\n\n" .
        "Mensaje:\n{$message}\n";

    $mail->send();
    respond(200, ['ok' => true]);
} catch (Exception $e) {
    error_log('Contacto Almatriz - fallo envio: ' . $mail->ErrorInfo);
    respond(500, ['ok' => false, 'error' => 'No se pudo enviar el mensaje. Intenta mas tarde o escribe por WhatsApp.']);
}
