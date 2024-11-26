<?php
require "partials/head.php";
require "partials/nav.php";

require_once 'clases/controllers/ChatController.php'; 
require_once 'clases/controllers/UserController.php'; 

require_once 'clases/entities/User.php';

$chatController = new ChatController();
$USU = new UserController();

if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Inicia la sesión si no ha sido iniciada
}

$user = $_SESSION['user_id']; 

// Obtener término de búsqueda, si existe
$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
$instructors = $chatController->getInstructors($searchTerm);

// Obtener instructor seleccionado y manejar chats
$instructorId = isset($_GET['instructor_id']) ? $_GET['instructor_id'] : null;
$chatId = null;
if ($instructorId) {
    // Intentar recuperar o crear el chat entre ambos usuarios
    $chatId = $chatController->getChatId($currentUserId, $instructorId);
}

// Manejar envío de mensajes
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['message'], $chatId)) {
    $message = trim($_POST['message']);
    if (!empty($message)) {
        $chatController->saveMessage($chatId, $currentUserId, $message);
    }
}
?>

<div class="chat-page bg-light">
    <!-- Barra de búsqueda de instructores -->
    <div class="search-bar mb-3">
        <form method="GET" action="chat.view.php">
            <input type="text" class="form-control" name="search" placeholder="Buscar instructor..." value="<?php echo htmlspecialchars($searchTerm); ?>">
            <button class="btn btn-primary mt-2" type="submit">Buscar</button>
        </form>
    </div>

    <!-- Lista de instructores -->
    <div class="user-chat-list">
        <?php
        if ($instructors) {
            foreach ($instructors as $instructor) {
                ?>
                <div class="chat-user-profile">
                    <div class="d-flex align-items-center">
                        <img class="rounded-circle nav-avatar" src="https://via.placeholder.com/40" alt="Avatar" style="margin-right: 0.5rem;">
                        <h5><?php echo htmlspecialchars($instructor['firstName']); ?></h5>
                    </div>
                    <button class="btn btn-primary" onclick="createChat(<?php echo $instructor['id']; ?>)">
        Iniciar chat
    </button>
                </div>
                <?php
            }
        } else {
            echo '<p>No se encontraron instructores.</p>';
        }
        ?>
    </div>

    <!-- Panel de mensajes -->
    <div class="messages">
        <div class="msg-profile bg-light">
        <img class="rounded-circle nav-avatar" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQgYN6WeHs6tndhVLPPLjId5KiXOlZ26pLLig&s" alt="" style="width: 40px; height: 40px; margin-right: 0.5rem;">
            <h4>Nombre</h4>
        </div>
        <div class="message-container">

            <?php require "partials/incomming-message.php" ?>
            <?php require "partials/ongoing-message.php" ?>
            <?php require "partials/incomming-message.php" ?>
            <?php require "partials/ongoing-message.php" ?>
            <?php require "partials/incomming-message.php" ?>
            <?php require "partials/ongoing-message.php" ?>
        </div>
        <div class="msg-bar bg-light">
            <input type="text" class="form-control" style="max-width: 85%">
            <button class="btn btn-primary">Send</button>
        </div>
    </div>
</div>

<?php require "partials/footer.php"; ?>
<script src="scripts/chats.js"></script>
