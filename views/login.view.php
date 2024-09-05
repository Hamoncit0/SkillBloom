
<?php require 'partials/head.php' ?>

<body>
    <div class="container">
        <div class="login-container">
            <h2>Inicio de Sesión</h2>
            <form action="dashboard" method="post">
                <input type="email" name="email" placeholder="Correo electrónico" required>
                <input type="password" name="password" placeholder="Contraseña" required>
                <button type="submit">Iniciar Sesión</button>
            </form>
            <div class="links">
                <a href="/signup">¿No tienes una cuenta? Regístrate</a><br>
                <a href="/recoverPassword">Olvidé mi contraseña</a>
            </div>
        </div>
    </div>
</body>