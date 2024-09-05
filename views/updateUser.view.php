
<?php require 'partials/head.php' ?><body>

    <div class="container">
        <div class="update-container">
            <h2>Actualizar Información de Usuario</h2>
            <form action="procesar_actualizacion.php" method="post" enctype="multipart/form-data">
                <input type="text" name="nombre_completo" placeholder="Nombre completo" value="Nombre Actual" required>
                <select name="genero" required>
                    <option value="masculino" selected>Masculino</option>
                    <option value="femenino">Femenino</option>
                    <option value="otro">Otro</option>
                </select>
                <input type="date" name="fecha_nacimiento" value="2000-01-01" required>
                <input type="file" name="avatar" accept="image/*">
                <input type="email" name="email" placeholder="Correo electrónico" value="email@ejemplo.com" required>
                <input type="password" name="password_actual" placeholder="Contraseña Actual" required>
                <button type="submit">Actualizar Información</button>
            </form>
            <div class="links">
                <a href="/dashboard">Volver</a><br>
                <a href="#dar de baja">Deshabilitar Cuenta</a>
            </div>
        </div>
    </div>
</body>