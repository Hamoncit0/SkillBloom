
<?php require 'partials/head.php' ?>
<body>
    <div class="container">
        <div class="register-container">
            <h2>Registro de Usuario</h2>
            <form action="procesar_registro.php" method="post" enctype="multipart/form-data">
                <input type="text" name="nombre_completo" placeholder="Nombre completo" required>
                <select name="genero" required>
                    <option value="" disabled selected>Género</option>
                    <option value="masculino">Masculino</option>
                    <option value="femenino">Femenino</option>
                    <option value="otro">Otro</option>
                </select>
                <input type="date" name="fecha_nacimiento" required>
                <input type="file" name="avatar" accept="image/*" required>
                <input type="email" name="email" placeholder="Correo electrónico" required>
                <input type="password" name="password" placeholder="Contraseña" required>
                <input type="password" name="confirm_password" placeholder="Confirmar contraseña" required>
                
                <select name="rol" required>
                    <option value="" disabled selected>Selecciona tu rol</option>
                    <option value="alumno">Alumno</option>
                    <option value="instructor">Instructor</option>
                </select>

                <button type="submit">Registrarse</button>
            </form>
            <div class="links">
                <a href="/">¿Ya tienes una cuenta? Inicia Sesión</a>
            </div>
        </div>
    </div>
</body>