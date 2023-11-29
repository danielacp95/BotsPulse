<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];

    $destinatario = 'daniela.caraballo@davinci.edu.com';
    $asunto = 'Nuevo mensaje de contacto';

    $cuerpo = "Nombre: $nombre\n";
    $cuerpo .= "Correo electrónico: $email\n";
    $cuerpo .= "Mensaje:\n$mensaje\n\n";
    $cuerpo .= "Confirmamos la recepción de tu solicitud. En breve nos estaremos comunicando para informarte los siguientes pasos. Saludos. BotPulse.\n";
    $cuerpo .= "Fecha: " . date('d/m/Y H:i:s') . "\n";
    $cuerpo .= "IP del remitente: " . $_SERVER['REMOTE_ADDR'] . "\n";
    $cuerpo .= "Navegador del remitente: " . $_SERVER['HTTP_USER_AGENT'];

    $cabeceras = 'From: tu_direccion_de_email@tudominio.com' . "\r\n" .
        'Reply-To: tu_direccion_de_email@tudominio.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    $enviado = mail($destinatario, $asunto, $cuerpo, $cabeceras);

    if ($enviado) {
        header('Location: gracias.html');
        exit;
    } else {
        header('Location: error.html');
        exit;
    }
} else {
    header('Location: index.html');
    exit;
}
?>
