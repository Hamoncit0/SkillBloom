<?php
session_start();  // Asegúrate de iniciar la sesión

// Destruir todas las variables de sesión
$_SESSION = [];

// Destruir la sesión en el servidor
session_destroy();
?>

<script>
    // Limpiar el localStorage de JavaScript
    localStorage.clear();

        // Redirigir al usuario después de limpiar
    setTimeout(() => {
        window.location.href = "/login";
    }, 500); // Espera breve para asegurar que localStorage se limpia antes de redirigir
</script>
<?php
// Redirigir al usuario a la página de inicio o login
header("Location: /login");
exit;
?>
