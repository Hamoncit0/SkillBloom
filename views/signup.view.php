
<?php require 'partials/head.php' ?>
<body>
    <div class="container mt-5">
        <div class="register-container border p-4 shadow-sm rounded">
            <h2 class="text-center mb-4">Registro de Usuario</h2>
            <form action="procesar_registro.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <input type="text" name="nombre_completo" class="form-control" placeholder="Nombre completo" required>
                </div>
                <div class="mb-3">
                    <select name="genero" class="form-select" required>
                        <option value="" disabled selected>Género</option>
                        <option value="masculino">Masculino</option>
                        <option value="femenino">Femenino</option>
                        <option value="otro">Otro</option>
                    </select>
                </div>
                <div class="mb-3">
                    <input type="date" name="fecha_nacimiento" class="form-control" required>
                </div>
                <div class="mb-3">
                    <input type="file" name="avatar" class="form-control" accept="image/*" required>
                </div>
                <div class="mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Correo electrónico" required>
                </div>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                </div>
                <div class="mb-3">
                    <input type="password" name="confirm_password" class="form-control" placeholder="Confirmar contraseña" required>
                </div>
                <div class="mb-3">
                    <select name="rol" class="form-select" required>
                        <option value="" disabled selected>Selecciona tu rol</option>
                        <option value="alumno">Alumno</option>
                        <option value="instructor">Instructor</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary w-100">Registrarse</button>
            </form>
            <div class="links">
                <a href="/">¿Ya tienes una cuenta? Inicia Sesión</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>