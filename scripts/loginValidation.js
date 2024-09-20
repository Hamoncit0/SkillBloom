document.getElementById("loginForm").addEventListener('submit', function(event){
    event.preventDefault();
    let isValid = true;
    //validaciones de nombre
    const password = document.getElementById('loginPassword');
    const passwordError = document.getElementById('passwordError')
    if(password.value == ""){
        isValid = false;
        passwordError.textContent = "Input a valid password."
    }else{
        passwordError.textContent = ""
    }
    //Validaciones de email
    const email = document.getElementById('loginEmail').value;
    const emailError = document.getElementById('emailError');
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!emailRegex.test(email)) {
        emailError.textContent = 'Por favor, ingresa un correo electrónico válido.';
        isValid = false;
    } else {
        emailError.textContent = '';
    }

    // Si todas las validaciones pasan, muestra el mensaje de éxito y limpia el formulario
    if (isValid) {
        alert('Log in successful');
        this.reset();
        window.location.href = '/'; 
    }
});
