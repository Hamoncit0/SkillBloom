<?php require "partials/head.php" ?>
<?php require "partials/nav.php" ?>
<div class="login bg-light">
    <img src="../images/supporting-business-person-svgrepo-com.svg"/>
    <form id="loginForm" action=""  method="POST">
        <h2>Log in to continue your learning journey</h2>
        <div class="mb-3">
            <label for="loginEmail" class="form-label">Email:</label>
            <input class="form-control" type="email" name="loginEmail" id="loginEmail">
            <small class="text-danger" id="emailError"></small>
        </div>
        <div class="mb-3">
            <label for="loginEmail" class="form-label">Password:</label>
            <input class="form-control" type="password" name="loginPassword" id="loginPassword">
            <small class="text-danger" id="passwordError"></small>
        </div>
        <button type="submit" class="btn btn-primary fs-4 fw-5 text-light"><i class="bi bi-box-arrow-right"></i> Log In</button>
        <div class="smallLogin">Don't have an account yet? <a href="/signup">Sign Up</a></div>
    </form>
</div>
<script src="../scripts/loginValidation.js"></script>
<? require "partials/footer.php" ?>