<?php require "partials/head.php" ?>
<?php require "partials/nav.php" ?>
<div class="chat-page">
    <div class="user-chat-list bg-body-secondary">
        <?php require "partials/chat-user-profile.php" ?>
        <?php require "partials/chat-user-profile.php" ?>
        
    </div>
    <div class="messages">
        <div class="msg-profile bg-body-tertiary">
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
        <div class="msg-bar bg-body">
            <input type="text" class="form-control" style="max-width: 85%">
            <button class="btn btn-primary">Send</button>
        </div>
    </div>
</div>
<?php require "partials/footer.php" ?>