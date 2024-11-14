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
                <img class="rounded-circle img-fluid" src="<?php echo $user->pfpPath ?>" alt="Profile Picture">
                <h4><?= htmlspecialchars($user->firstName) ?></h4>
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
                        <input type="text" placeholder="First Name" class="form-control" id="firstNameUU" name="firstName" value="<?= htmlspecialchars($user->firstName) ?>" >
                        <small class="text-danger" id="firstNameError"></small>
                    </div>
                    
                    <!-- Last Name -->
                    <div class="mb-3">
                        <input type="text" placeholder="Last Name" class="form-control" id="lastNameUU" name="lastName" value="<?= htmlspecialchars($user->lastName) ?>" >
                        <small class="text-danger" id="lastNameError"></small>
                    </div>
                    
                    <!-- Email (no se puede modificar) -->
                    <div class="mb-3">
                        <input  type="email" placeholder="Email" class="form-control" disabled id="emailUU" value="<?= htmlspecialchars($user->email) ?>">
                        <small class="text-danger" id="emailError"></small>
                    </div>
                    
                    <!-- Birthdate -->
                    <div class="mb-3">
                        <input type="date" class="form-control" id="date-inputUU" name="birthdate" value="<?= htmlspecialchars($user->birthdate) ?>" required>
                        <small class="text-danger" id="date-inputError"></small>
                    </div>
                    
                    <!-- Gender (m = male, f = female, o = other) -->
                    <div class="mb-3">
                        <select class="form-select" aria-label="Select Gender" id="genderUU" name="gender" required>
                            <option value="" disabled>Select your gender...</option>
                            <option value="m" <?= $user->gender == 'm' ? 'selected' : '' ?>>Male</option>
                            <option value="f" <?= $user->gender == 'f' ? 'selected' : '' ?>>Female</option>
                            <option value="o" <?= $user->gender == 'o' ? 'selected' : '' ?>>Other</option>
                        </select>
                        <small class="text-danger" id="genderError"></small> 
                    </div>

                    <button type="submit" name="updateUserForm" class="btn btn-primary">Save changes</button>
                </form>
                <hr>
                <!-- Aquí se puede añadir la opción de cambiar la foto de perfil -->
                <?php if (isset($pfpStatus)): ?>
                    <?php if ($changedPfp): ?>
                        <div class="alert alert-success">
                            <?php echo $pfpStatus; ?>
                        </div>
                    <?php else: ?>
                        <div class="alert alert-danger">
                            <?php echo $pfpStatus; ?>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
                <div class="profile-picture-upload text-center">
                    <img id="profilePreview" class="rounded-circle img-fluid" src="<?php echo $user->pfpPath ?: 'SkillBloom_icon.png' ?>" alt="Profile Picture" style="max-width: 20rem; align-self:center; margin: 3rem;">

                    <!-- Formulario para subir la imagen de perfil -->
                    <form id="updatePFP" enctype="multipart/form-data">
                        <!-- Label como botón para cargar la imagen -->
                        <label for="profilePicture" class="btn btn-primary">Upload Picture</label>
                        <input type="file" id="profilePicture" name="profilePicture" accept="image/*" style="display: none;" onchange="handleFileUpload(event)">
                    </form>
                </div>
                <hr>
                <!-- Cambio de contraseña (opcional) -->
                <form id="updateUserPassword" action="" method="POST">
                <?php if (isset($passwordStatus)): ?>
                    <?php if ($changed): ?>
                        <div class="alert alert-success">
                            <?php echo $passwordStatus; ?>
                        </div>
                    <?php else: ?>
                        <div class="alert alert-danger">
                            <?php echo $passwordStatus; ?>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
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
                    <button type="submit" name="changePassword" class="btn btn-primary">Change Password</button>
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
<script>
    // Función para mostrar una vista previa de la imagen seleccionada
    function previewImage(event) {
        const preview = document.getElementById('profilePreview');
        const file = event.target.files[0];
        
        // Verificar que se haya seleccionado un archivo y que sea una imagen
        if (file && file.type.startsWith('image/')) {
            preview.src = URL.createObjectURL(file);
        }
    }
     // Función para mostrar vista previa y convertir la imagen a base64
    // Función para mostrar vista previa y convertir la imagen a base64
function handleFileUpload(event) {
    const preview = document.getElementById('profilePreview');
    const file = event.target.files[0];

    // Verificar que el archivo sea una imagen
    if (file && file.type.startsWith('image/')) {
        // Limitar el tamaño de la imagen (en este caso, 2MB)
        const MAX_SIZE =  264 * 264; // 2MB

        // Comprobar si el tamaño del archivo es mayor al permitido
        if (file.size > MAX_SIZE) {
            alert('The file is too large. Please select a file smaller than 50kb.');
            return;
        }

        // Actualizar la vista previa de la imagen
        preview.src = URL.createObjectURL(file);

        // Convertir la imagen a base64 y enviarla por AJAX
        const reader = new FileReader();
        reader.onload = function(e) {
            const base64Image = e.target.result;

            // Enviar la imagen al servidor usando AJAX
            uploadProfilePicture(base64Image);
        };
        reader.readAsDataURL(file);
    } else {
        alert('Please select a valid image file.');
    }
}


    // Función para enviar la imagen en base64 al servidor
    function uploadProfilePicture(base64Image) {
        const formData = new FormData();
        formData.append('profilePicture', base64Image);

        fetch('editProfile', {
            method: 'POST',
            body: formData
        })
        // .then(response => response.json())
        // .then(data => {
        //     // Mostrar mensaje de éxito o error
        //     if (data.success) {
        //         alert('Profile picture updated successfully!');
        //     } else {
        //         alert('Failed to update profile picture.');
        //     }
        // })
        // .catch(error => console.error('Error:', error));
    }
</script>
<?php require "partials/footer.php"; ?>
