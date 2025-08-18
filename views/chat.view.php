<?php require "partials/head.php" ?>
<?php require "partials/nav.php" ?>
<div class="chat-page">
  
    <div class="messages">
        <div class="msg-profile bg-body-tertiary">
            <img class="rounded-circle nav-avatar" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQgYN6WeHs6tndhVLPPLjId5KiXOlZ26pLLig&s" alt="" style="width: 40px; height: 40px; margin-right: 0.5rem;"/>
            <h4>
                <?php
                    // Mostrar el nombre contrario según el usuario actual
                    if ($currentUserId == $chat->idUser1) {
                        echo htmlspecialchars($chat->nameUser2 ?: '');
                    } elseif ($currentUserId == $chat->idUser2) {
                        echo htmlspecialchars($chat->nameUser1 ?: '');
                    } else {
                        echo 'Usuario desconocido';
                    }
                ?>
            </h4>
        </div>
        <div class="message-container">
            <?php if (!empty($messages)): ?>
                <?php foreach ($messages as $message): ?>
                    <?php if ($message->idSender == $currentUserId): ?>
                        <?php require "partials/ongoing-message.php" ?>
                    <?php else: ?>
                        <?php require "partials/incomming-message.php" ?>
                    <?php endif; ?>
                <?php endforeach; ?>

            <?php else: ?>
                <p>There aren't any messages.</p>
            <?php endif; ?>
        </div>
        <form class="msg-bar bg-body" action="/chat?id=<?php echo htmlspecialchars($chatId); ?>" method="POST" onsubmit="return validateMessage(event);">
            <input type="text" name="content" id="content" class="form-control" style="max-width: 85%">
            <button type="submit"  class="btn btn-primary">Send</button>
        </form>
    </div>
</div>

<?php require "partials/footer.php"; ?>
<script src="scripts/chats.js"></script>
<script>
    function validateMessage(event) {
        const content = document.getElementById('content').value.trim(); // Obtener el valor del input y eliminar espacios
        if (content === '') {
            event.preventDefault(); // Evitar que el formulario se envíe
            alert('Please enter a message.');
            return false; // Asegura que el formulario no se envíe
        }
        return true; // Permitir que el formulario se envíe si la validación pasa
    }
</script>
