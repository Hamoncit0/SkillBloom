<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pantalla de Mensajes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/mensajes.css">
</head>
<body>
<header>
            <?php include 'partials/nav.php'; ?>
        </header>

    <div class="chat-container">
        

        
        <!-- Sidebar de chats pendientes -->
        <div class="sidebar">
            <h3>Chats</h3>
            <div class="chat-list">
                <div class="chat-item">
                    <img src="avatar1.jpg" alt="Instructor Avatar">
                    <span>Instructor 1</span>
                </div>
                <div class="chat-item">
                    <img src="avatar2.jpg" alt="Instructor Avatar">
                    <span>Instructor 2</span>
                </div>
                <!-- Agrega más chats según sea necesario -->
            </div>
        </div>
    
        <!-- Área de chat principal -->
        <div class="chat-main">

            <div class="chat-window">
                <div class="message">
                    <img src="student-avatar.jpg" alt="Student Avatar">
                    <div class="message-content">
                        <span class="message-user">Estudiante</span>
                        <span class="message-time">10:30 AM</span>
                        <p>Hola, tengo una duda sobre el curso.</p>
                    </div>
                </div>
                <div class="message">
                    <img src="instructor-avatar.jpg" alt="Instructor Avatar">
                    <div class="message-content">
                        <span class="message-user">Instructor</span>
                        <span class="message-time">10:35 AM</span>
                        <p>Claro, ¿en qué puedo ayudarte?</p>
                    </div>
                </div>
                <!-- Más mensajes -->
            </div>
            <div class="chat-input">
                <input type="text" placeholder="Escribe un mensaje...">
                <button>Enviar</button>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

