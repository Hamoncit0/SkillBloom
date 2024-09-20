document.getElementById("signupForm").addEventListener('submit', function(event){
    event.preventDefault();
    let isValid = true;
    //validaciones de nombre
    const firstName = document.getElementById('firstNameSU');
    const firstNameError = document.getElementById('firstNameError')
    if(firstName.value == ""){
        isValid = false;
        firstNameError.textContent = "Input a valid name."
    }else{
        firstNameError.textContent = ""
    }
    //validaciones de apellido
    const lastName = document.getElementById('lastNameSU');
    const lastNameError = document.getElementById('lastNameError')
    if(lastName.value == ""){
        isValid = false;
        lastNameError.textContent = "Input a valid name."
    }else{
        lastNameError.textContent = ""
    }
    //validaciones de contrasena
    const password = document.getElementById('passwordSU').value;
    const confirmPassword = document.getElementById('confirmPasswordSU').value;
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
    //Validaciones de email
    const email = document.getElementById('emailSU').value;
    const emailError = document.getElementById('emailError');
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!emailRegex.test(email)) {
        emailError.textContent = 'Por favor, ingresa un correo electrónico válido.';
        isValid = false;
    } else {
        emailError.textContent = '';
    }
    //Validaciones fecha de nacimiento
    const fechaNacimiento = document.getElementById('date-input').value;
    const fechaError = document.getElementById('date-inputError');
    const today = new Date().toISOString().split('T')[0];

   
    if(!fechaNacimiento){
        fechaError.textContent = 'Input a date please';
        isValid = false;

    } 
    else if (fechaNacimiento >= today) {
        fechaError.textContent = 'La fecha de nacimiento no puede ser mayor o igual a la fecha actual.';
        isValid = false;
    } 
    else {
        fechaError.textContent = '';
    }
    //validaciones genero
    const genderSelect = document.getElementById('genderSU');
    const genderError = document.getElementById('genderError');
    
    if (genderSelect.value === "") {
        genderError.textContent = "Please select your gender.";
        isValid = false;// Si es inválido
    } else {
        genderError.textContent = ""; // Si es válido, limpiamos el mensaje
       
    }
    //validaciones rol
    const rolSelect = document.getElementById('rolSU');
    const rolError = document.getElementById('rolError');
    
    if (rolSelect.value === "") {
        rolError.textContent = "Please select your rol.";
        isValid = false;// Si es inválido
    } else {
        rolError.textContent = ""; // Si es válido, limpiamos el mensaje
       
    }
   

    // Si todas las validaciones pasan, muestra el mensaje de éxito y limpia el formulario
    if (isValid) {
        alert('User registered successfully');
        this.reset();
        window.location.href = '/'; 
    }
});
