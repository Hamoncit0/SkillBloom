<?php require "partials/head.php" ?>
<?php require "partials/nav.php" ?>
<div class="signup bg-light">
    <img src="../images/supporting-business-person-diagonal-svgrepo-com.svg" alt="">
    <form id="signupForm" action="">
        <h2>Sign up and start learning</h2>
        <div class="mb-3">
            <label for="firstName" class="form-label">First Name:</label>
            <input class="form-control" type="text" name="firstName" id="firstNameSU">
            <small class="text-danger" id="firstNameError"></small>
        </div>
        <div class="mb-3">
            <label for="lastName" class="form-label">Last Name:</label>
            <input class="form-control" type="text" name="lastName" id="lastNameSU">
            <small class="text-danger" id="lastNameError"></small>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input class="form-control" type="email" name="email" id="emailSU">
            <small class="text-danger" id="emailError"></small>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input class="form-control" type="password" name="password" id="passwordSU"> 
            <small class="text-danger" id="passwordError"></small>
        </div>
        <div class="mb-3">
            <label for="confirmPassword" class="form-label">Confirm password:</label>
            <input class="form-control" type="password" name="confirmPassword" id="confirmPasswordSU">
            <small class="text-danger" id="confirmPasswordError"></small>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Birth date:</label>
            <input class="form-control" type="date" name="birthdate" min="today" id="date-input">
            <small class="text-danger" id="date-inputError"></small>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Gender:</label>
            <select class="form-select" aria-label="Default select example" id="genderSU">
                <option value="" disabled selected>Select your gender...</option>
                <option value="female">Female</option>
                <option value="male">Male</option>
                <option value="other">Other</option>
            </select>
            <small class="text-danger" id="genderError"></small> 
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Rol:</label>
            <select class="form-select" aria-label="Default select example" id="rolSU">
                <option value="" disabled selected>Select your rol...</option>
                <option value="student">Student</option>
                <option value="instructor">Instructor</option>
            </select>
            <small class="text-danger" id="rolError"></small> 
        </div>
        <button type="submit" class="btn btn-primary fs-4 fw-5 text-light">Sign up</button>
        <div class="smallLogin">You already have an account? <a href="/login">Log in</a></div>
    </form>
</div>
<script>
  // Obtener la fecha de ayer
  const today = new Date();
  const yesterday = new Date(today);
  yesterday.setDate(today.getDate() - 1);

  // Formatear la fecha a YYYY-MM-DD
  const formattedDate = yesterday.toISOString().split('T')[0];

  // Asignar la fecha máxima al input
  document.getElementById('date-input').setAttribute('max', formattedDate);
</script>
<script src="../scripts/signupValidations.js"></script>
<? require "partials/footer.php" ?>