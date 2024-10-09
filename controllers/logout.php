<?php
session_start();  // Asegúrate de iniciar la sesión

// Destruir todas las variables de sesión
$_SESSION = [];

// Destruir la sesión en el servidor
session_destroy();

// Redirigir al usuario a la página de inicio o login
header("Location: /login");
exit;
?>
