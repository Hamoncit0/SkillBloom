document.getElementById("loginForm").addEventListener('submit', function(event){
    
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
        emailError.textContent = 'Input a valid email.';
        isValid = false;
    } else {
        emailError.textContent = '';
    }

    // Si todas las validaciones pasan, muestra el mensaje de éxito y limpia el formulario
    if (isValid) {

    }else{
        event.preventDefault();
    }
});
