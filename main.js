document.getElementById('registroForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Evita el envío tradicional del formulario

    let isValid = true;

    // Validaciones aquí (mismas que antes)

    // Validación de contraseñas
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirm_password').value;
    const passwordError = document.getElementById('passwordError');
    const confirmPasswordError = document.getElementById('confirmPasswordError');

    const passwordRegex = /^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

    if (!passwordRegex.test(password)) {
        passwordError.textContent = 'La contraseña debe tener al menos 8 caracteres, una mayúscula, un número y un carácter especial.';
        isValid = false;
    } else {
        passwordError.textContent = '';
    }

    if (password !== confirmPassword) {
        confirmPasswordError.textContent = 'Las contraseñas no coinciden.';
        isValid = false;
    } else {
        confirmPasswordError.textContent = '';
    }

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
        alert('Usuario registrado con éxito');
        this.reset(); // Limpia el formulario
        window.location.href = '/'; // Redirige al usuario a la ruta '/'
    }
});