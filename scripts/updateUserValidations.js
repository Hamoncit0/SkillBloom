
document.getElementById("updateUserInfo").addEventListener('submit', function(event){
    event.preventDefault();
    let isValid = true;
    const updateSuccess =  document.getElementById("updateSuccess");
    //validaciones de nombre
    const firstName = document.getElementById('firstNameUU');
    const firstNameError = document.getElementById('firstNameError')
    if(firstName.value == ""){
        isValid = false;
        firstNameError.textContent = "Input a valid name."
        updateSuccess.textContent = '';
    }else{
        firstNameError.textContent = ""
    }
    //validaciones de apellido
    const lastName = document.getElementById('lastNameUU');
    const lastNameError = document.getElementById('lastNameError')
    if(lastName.value == ""){
        isValid = false;
        lastNameError.textContent = "Input a valid name."
        updateSuccess.textContent = '';
    }else{
        lastNameError.textContent = ""
    }

    //Validaciones fecha de nacimiento
    const fechaNacimiento = document.getElementById('date-inputUU').value;
    const fechaError = document.getElementById('date-inputError');
    const today = new Date().toISOString().split('T')[0];

   
    if(!fechaNacimiento){
        fechaError.textContent = 'Input a date please';
        isValid = false;

    } 
    else if (fechaNacimiento >= today) {
        fechaError.textContent = 'La fecha de nacimiento no puede ser mayor o igual a la fecha actual.';
        isValid = false;
        updateSuccess.textContent = '';
    } 
    else {
        fechaError.textContent = '';
    }
    //Validaciones de email
    const email = document.getElementById('emailUU').value;
    const emailError = document.getElementById('emailError');
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!emailRegex.test(email)) {
        emailError.textContent = 'Por favor, ingresa un correo electrónico válido.';
        isValid = false;
        updateSuccess.textContent = '';
    } else {
        emailError.textContent = '';
    }
    //validaciones genero
    const genderSelect = document.getElementById('genderUU');
    const genderError = document.getElementById('genderError');
    
    if (genderSelect.value === "") {
        genderError.textContent = "Please select your gender.";
        updateSuccess.textContent = '';
        isValid = false;// Si es inválido
    } else {
        genderError.textContent = ""; // Si es válido, limpiamos el mensaje
       
    }
 
     // Si todas las validaciones pasan, muestra el mensaje de éxito y limpia el formulario
     if (isValid) {
         alert('User updated successfully!');
         updateSuccess.textContent = 'User updated successfully!!';
     }
});
document.getElementById("updateUserPassword").addEventListener('submit', function(event){
    event.preventDefault();
    let isValid = true;
    const updateSuccess =  document.getElementById("passwordSuccess");

    //validaciones de contrasena
    const password = document.getElementById('passwordUU').value;
    const confirmPassword = document.getElementById('confirmPasswordUU').value;
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
        updateSuccess.textContent = '';
        isValid = false;
    } else {
        confirmPasswordError.textContent = '';
    }
    // Si todas las validaciones pasan, muestra el mensaje de éxito y limpia el formulario
    if (isValid) {
        alert('Password changed successfully');
        updateSuccess.textContent = 'Password changed successfully!!';
        this.reset();
    }
});