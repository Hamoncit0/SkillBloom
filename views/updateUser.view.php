
<?php require 'partials/head.php' ?><body>
<body>

    <div class="container">
        <div class="update-container">
            <h2>Actualizar Información de Usuario</h2>
            <form id="updateForm" action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="text" id="nombre_completo" name="nombre_completo" class="form-control" placeholder="Nombre completo" value="Nombre Actual" required>
                </div>
                
                <div class="form-group">
                    <select id="genero" name="genero" class="form-control" required>
                        <option value="masculino" selected>Masculino</option>
                        <option value="femenino">Femenino</option>
                        <option value="otro">Otro</option>
                    </select>
                    <small id="generoError" class="form-error"></small>
                </div>
                
                <div class="form-group">
                    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control" value="2000-01-01" required>
                    <small id="fechaError" class="form-error"></small>
                </div>
                
                <div class="form-group">
                    <input type="file" id="avatar" name="avatar" class="form-control" accept="image/*">
                    <small id="avatarError" class="form-error"></small>
                </div>
                
                <div class="form-group">
                    <input type="email" id="email" name="email" class="form-control" placeholder="Correo electrónico" value="email@ejemplo.com" required>
                    <small id="emailError" class="form-error"></small>
                </div>
                
                <div class="form-group">
                    <input type="password" id="password_actual" name="password_actual" class="form-control" placeholder="Contraseña Actual" required>
                    <small id="passwordError" class="form-error"></small>
                </div>
                
                <button type="submit" class="btn btn-primary">Actualizar Información</button>
            </form>
            
            <div class="links mt-3">
                <a href="/dashboard">Volver</a><br>
                <a href="#dar de baja">Deshabilitar Cuenta</a>
            </div>
        </div>
    </div>

    <script>
       document.getElementById('updateForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Evita el envío tradicional del formulario

    let isValid = true;

    

    // Validación de email
    const email = document.getElementById('email').value;
    const emailError = document.getElementById('emailError');
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!emailRegex.test(email)) {
        emailError.textContent = 'Por favor, ingresa un correo electrónico válido.';
        isValid = false;
    } else {
        emailError.textContent = '';
    }

    // Validación de fecha de nacimiento
    const fechaNacimiento = document.getElementById('fecha_nacimiento').value;
    const fechaError = document.getElementById('fechaError');
    const today = new Date().toISOString().split('T')[0];

    if (fechaNacimiento >= today) {
        fechaError.textContent = 'La fecha de nacimiento no puede ser mayor o igual a la fecha actual.';
        isValid = false;
    } else {
        fechaError.textContent = '';
    }

    // Si todas las validaciones pasan, muestra el mensaje de éxito y limpia el formulario
    if (isValid) {
        alert('Usuario actualizado con exito');
    }
});

    </script>

</body>