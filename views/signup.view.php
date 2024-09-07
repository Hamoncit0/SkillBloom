<?php require 'partials/head.php' ?>
<body>
    <div class="container mt-5">
        <div class="register-container border p-4 shadow-sm rounded">
            <h2 class="text-center mb-4">Registro de Usuario</h2>
            <form id="registroForm" action="/" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <input type="text" id="nombre_completo" name="nombre_completo" class="form-control" placeholder="Nombre completo" required>
                    <small id="nombreError" class="text-danger"></small>
                </div>
                <div class="mb-3">
                    <select id="genero" name="genero" class="form-select" required>
                        <option value="" disabled selected>Género</option>
                        <option value="masculino">Masculino</option>
                        <option value="femenino">Femenino</option>
                        <option value="otro">Otro</option>
                    </select>
                    <small id="generoError" class="text-danger"></small>
                    <br>
                </div>
                <div class="mb-3">
                    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control" required>
                    <small id="fechaError" class="text-danger"></small>
                    <br>
                </div>
                <div class="mb-3">
                    <input type="file" id="avatar" name="avatar" class="form-control" accept="image/*" required>
                    <small id="avatarError" class="text-danger"></small>
                    <br>
                </div>
                <div class="mb-3">
                    <input type="email" id="email" name="email" class="form-control" placeholder="Correo electrónico" required>
                    <small id="emailError" class="text-danger"></small>
                </div>
                <div class="mb-3">
                    <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" required>
                    <small id="passwordError" class="text-danger"></small>
                </div>
                <div class="mb-3">
                    <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Confirmar contraseña" required>
                    <small id="confirmPasswordError" class="text-danger"></small>
                </div>
                <div class="mb-3">
                    <select id="rol" name="rol" class="form-select" required>
                        <option value="" disabled selected>Selecciona tu rol</option>
                        <option value="alumno">Alumno</option>
                        <option value="instructor">Instructor</option>
                    </select>
                    <small id="rolError" class="text-danger"></small>
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

    <!-- JavaScript para validaciones -->
    <script src="../main.js"></script>
</body>
