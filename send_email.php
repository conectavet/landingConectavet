<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Configuración del correo
    $to = "buckapis@gmail.com";
    $subject = "Nuevo registro desde el formulario";

    // Datos enviados desde el formulario
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $role = htmlspecialchars($_POST['role']);
    $comment = htmlspecialchars($_POST['comment']);

    // Contenido del correo
    $message = "
        <html>
        <head>
            <title>Nuevo Registro</title>
        </head>
        <body>
            <h2>Detalles del Registro</h2>
            <p><strong>Nombre:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Rol:</strong> $role</p>
            <p><strong>Comentario:</strong> $comment</p>
        </body>
        </html>
    ";

    // Encabezados del correo
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: <$email>" . "\r\n";

    // Enviar el correo
    if (mail($to, $subject, $message, $headers)) {
        echo "El formulario se envió correctamente.";
    } else {
        echo "Hubo un problema al enviar el formulario.";
    }
} else {
    echo "Método no permitido.";
}
?>
