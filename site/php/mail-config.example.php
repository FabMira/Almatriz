<?php
// Configuracion SMTP para el formulario de contacto.
// IMPORTANTE: reemplaza SMTP_PASS por un "App Password" de Google
// (cuenta contactoalmatriz@gmail.com -> Seguridad -> Verificacion en 2 pasos
//  -> Contrasenas de aplicaciones). NO uses la clave normal de Gmail.
return [
    'SMTP_HOST'   => 'smtp.gmail.com',
    'SMTP_PORT'   => 587,            // 587 = STARTTLS (recomendado). Si el host lo bloquea, prueba 465 (SSL).
    'SMTP_SECURE' => 'tls',          // 'tls' para 587, 'ssl' para 465
    'SMTP_USER'   => 'contactoalmatriz@gmail.com',
    'SMTP_PASS'   => 'PON_AQUI_TU_APP_PASSWORD', // <-- 16 caracteres, sin espacios
    'MAIL_FROM'   => 'contactoalmatriz@gmail.com',
    'MAIL_FROM_NAME' => 'Web Almatriz',
    'MAIL_TO'     => 'contactoalmatriz@gmail.com',
    'MAIL_TO_NAME' => 'Almatriz',
];
