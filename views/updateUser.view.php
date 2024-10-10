<?php require "partials/head.php"; ?>
<?php require "partials/nav.php"; ?>
<?php
// Inicia la sesión para acceder a los datos
//session_start();

if (isset($_SESSION['user'])) {
    ?>
    <div class="user-data bg-light">
        <div class="edit-container">
            <div class="leftEditProfile">
                <!-- Imagen de perfil, si tiene una -->
                <img class="rounded-circle img-fluid" src="<?= htmlspecialchars($user['pfpPath']) ?: 'default-image.jpg'; ?>" alt="Profile Picture">
                <h4><?= htmlspecialchars($user['firstName']) ?></h4>
            </div>
            <div class="rightEditProfile">
                <form action="" method="POST" id="updateUserInfo">
                    <h4>Information:</h4>
                    <?php if (isset($updateStatus)): ?>
            <?php if ($updated): ?>
                <div class="alert alert-success">
                    <?php echo $updateStatus; ?>
                </div>
            <?php else: ?>
                <div class="alert alert-danger">
                    <?php echo $updateStatus; ?>
                </div>
            <?php endif; ?>
        <?php endif; ?>
                    <p class="text-success" id="updateSuccess"></p>
                    
                    <!-- First Name -->
                    <div class="mb-3">
                        <input name="editFirstName" type="text" placeholder="First Name" class="form-control" id="firstNameUU" value="<?= htmlspecialchars($user['firstName']) ?>" required>
                        <small class="text-danger" id="firstNameError"></small>
                    </div>
                    
                    <!-- Last Name -->
                    <div class="mb-3">
                        <input name="editLastName" type="text" placeholder="Last Name" class="form-control" id="lastNameUU" value="<?= htmlspecialchars($user['lastName']) ?>" required>
                        <small class="text-danger" id="lastNameError"></small>
                    </div>
                    
                    <!-- Email (no se puede modificar) -->
                    <div class="mb-3">
                        <input name="editEmail" type="email" placeholder="Email" class="form-control" disabled id="emailUU" value="<?= htmlspecialchars($user['email']) ?>">
                        <small class="text-danger" id="emailError"></small>
                    </div>
                    
                    <!-- Birthdate -->
                    <div class="mb-3">
                        <input name="editBirthDate" type="date" class="form-control" id="date-inputUU" value="<?= htmlspecialchars($user['birthdate']) ?>" required>
                        <small class="text-danger" id="date-inputError"></small>
                    </div>
                    
                    <!-- Gender (m = male, f = female, o = other) -->
                    <div class="mb-3">
                        <select class="form-select" aria-label="Select Gender" id="genderUU" name="editGender" required>
                            <option value="" disabled>Select your gender...</option>
                            <option value="m" <?= $user['gender'] == 'm' ? 'selected' : '' ?>>Male</option>
                            <option value="f" <?= $user['gender'] == 'f' ? 'selected' : '' ?>>Female</option>
                            <option value="o" <?= $user['gender'] == 'o' ? 'selected' : '' ?>>Other</option>
                        </select>
                        <small class="text-danger" id="genderError"></small> 
                    </div>

                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
                <hr>
                <!-- Aquí se puede añadir la opción de cambiar la foto de perfil -->
                <img class="rounded-circle img-fluid" src="<?= htmlspecialchars($user['pfpPath']) ?: 'default-image.jpg'; ?>" alt="Profile Picture" style="max-width: 50%; align-self:center; margin: 3rem;">
                <button class="btn btn-primary">Upload Picture</button>
                <hr>
                <!-- Cambio de contraseña (opcional) -->
                <form id="updateUserPassword" action="updatePasswordProcess.php" method="POST">
                    <h4>Change Password:</h4>
                    <p class="text-success" id="passwordSuccess"></p>
                    <div class="mb-3">
                        <input name="newPassword" type="password" placeholder="New Password" class="form-control" id="passwordUU" required>
                        <small class="text-danger" id="passwordError"></small>
                    </div>
                    <div class="mb-3">
                        <input name="confirmNewPassword" type="password" placeholder="Confirm New Password" class="form-control" id="confirmPasswordUU" required>
                        <small class="text-danger" id="confirmPasswordError"></small>
                    </div>
                    <button type="submit" class="btn btn-primary">Change Password</button>
                </form>
            </div>
        </div>
    </div>
    <?php 
} else {
    die('User ID not found in session.');
}
?>

<script src="../scripts/updateUserValidations.js"></script>
<?php require "partials/footer.php"; ?>
