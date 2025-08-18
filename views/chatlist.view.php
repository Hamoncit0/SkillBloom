<?php require "partials/head.php" ?>
<?php require "partials/nav.php" ?>
<div class="chat-list-page">
    <div class="chat-list card">
        <h2 class="mb-3">My chats</h2>
        <?php if (!empty($chatList)): ?>
            <?php foreach ($chatList as $chat): ?>
                <div class="chat-user card mb-3">
                    <div class="card-body row align-items-center">
                        <h4 class="col-6">
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
                        <a href="/chat?id=<?php echo htmlspecialchars($chat->id);?>" class="btn btn-primary col-4">Ir a chat</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>You don't have any chats.</p>
        <?php endif; ?>
    </div>
    <div class="chat-list card">
        <h2 class="mb-3">Look for a new chat</h2>
        <?php if (!empty($chatListnoChat)): ?>
            <?php foreach ($chatListnoChat as $chat): ?>
                <div class="chat-user card mb-3">
                    <div class="card-body row align-items-center">
                        <h4 class="col-6">
                            <?php echo htmlspecialchars($chat->nameUser1);?>
                        </h4>
                        <form action="/chatlist" method="POST" class=" col-4">
                            <button type="submmit" name="idNewUserChat" value="<?php echo htmlspecialchars($chat->idUser1);?>" class="btn btn-primary col-12">Iniciar chat</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Looks like there is no one else to talk to :(</p>
        <?php endif; ?>
       
    </div>
</div>