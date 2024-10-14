<?php
//session_start(); // Asegúrate de que la sesión esté iniciada
require 'clases/controllers/UserController.php';
require 'partials/head.php';
require "partials/nav.php";

// Verifica si el usuario está en la sesión
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user']; // Asignar la información del usuario a $user

    // Asegúrate de que sea un objeto de la clase User
    if ($user instanceof User) {
        ?>
        <div class="see-profile-public bg-light">
            <div class="user-data-public">
                <!-- Imagen de perfil -->
                <img class="rounded-circle img-fluid" src="<?= htmlspecialchars($user->pfpPath ?: 'default-image.jpg') ?>" alt="Profile Picture">
                
                <div>
                    <!-- Muestra el nombre y apellidos del usuario -->
                    <h4><?= htmlspecialchars($user->firstName) ?> </h4>
                    <h5>Last Name: <?= htmlspecialchars($user->lastName) ?></h5>
                    
                    <!-- Mostrar el rol, fecha de nacimiento y fecha de inscripción -->
                    <p>Rol: <?= htmlspecialchars($user->idRol) ?></p>
                    <p>Birth date: <?= htmlspecialchars($user->birthdate) ?></p>
                    <p>Enrollment date: <?= htmlspecialchars($user->createdAt) ?></p>
                    
                    <!-- Botón de enviar mensaje -->
                    <button class="btn btn-primary">Send Message</button>
                </div>
            </div>

            <?php 
    } else {
        die('Session data is not an instance of User class.');
    }
    ?>
    <!-- Cursos del usuario -->
    <div class="courses-profile-public">
        <?php require "partials/course-profile.php" ?>
        <?php require "partials/course-profile.php" ?>
        <?php require "partials/course-profile.php" ?>
        <?php require "partials/course-profile.php" ?>
        <?php require "partials/course-profile.php" ?>
        <?php require "partials/course-profile.php" ?>
        <?php require "partials/course-profile.php" ?>
    </div>
</div>
<?php 
} else {
    // Si no hay usuario en la sesión, muestra un error o redirecciona
    die('User not found in session.');
}
?>

<?php require 'partials/footer.php' ?>