<?php require 'partials/head.php' ?>
<body>
    <div class="forgot-password-container">
        <h2>¿Olvidaste tu contraseña?</h2>
        <p>Ingresa tu correo electrónico y te enviaremos un enlace para restablecer tu contraseña.</p>

        <form action="procesar-recuperacion.php" method="post">
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required>

            <button type="submit">Enviar enlace de recuperación</button>
        </form>

        <div class="links">
        <a href="/" class="back-to-login">Volver a Inicio de Sesión</a>
        </div>
    </div>
</body>