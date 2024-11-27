
document.addEventListener("DOMContentLoaded", function () {
    // Botón para enviar mensajes
    const sendButton = document.querySelector('.msg-bar .btn');
    const inputField = document.querySelector('.msg-bar input[type="text"]');
    const chatId = window.location.search.split('chat_id=')[1]; // Obtener el chat_id de la URL

    // Evento para enviar mensajes
    if (sendButton && inputField && chatId) {
        sendButton.addEventListener('click', function () {
            const message = inputField.value.trim();
            if (message) {
                fetch('chat.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `chat_id=${chatId}&message=${encodeURIComponent(message)}`,
                })
                    .then(response => response.text())
                    .then(data => {
                        console.log('Mensaje enviado:', data);
                        inputField.value = ''; // Limpiar el campo de texto

                        // Actualizar la lista de mensajes dinámicamente
                        const messageContainer = document.querySelector('.message-container');
                        const newMessage = document.createElement('div');
                        newMessage.className = 'message outgoing';
                        newMessage.textContent = message;
                        messageContainer.appendChild(newMessage);
                        messageContainer.scrollTop = messageContainer.scrollHeight; // Desplazar al último mensaje
                    })
                    .catch(error => {
                        console.error('Error al enviar el mensaje:', error);
                    });
            } else {
                alert('Escribe un mensaje antes de enviar');
            }
        });
    }
    

    // Función para crear un chat con un instructor
    window.createChat = async function (instructorId) {
        try {
            const response = await fetch(`chat.php`, {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: new URLSearchParams({ instructor_id: instructorId })
            });
    
            if (response.ok) {
                const data = await response.json();
                console.log('Chat creado:', data);
                // Redirige al usuario al chat
                window.location.href = `chat.view.php?chat_id=${data.chat_id}`;
            } else {
                console.error('Error al crear el chat');
            }
        } catch (error) {
            console.error('Error en la solicitud:', error);
        }
    };
    

    // Evento para el envío de mensajes al presionar Enter
    inputField.addEventListener('keypress', function (event) {
        if (event.key === 'Enter') {
            event.preventDefault();
            sendButton.click();
        }
    });

    // Agregar evento para formulario dinámico, si es necesario
    const form = document.querySelector('form');
    if (form) {
        form.addEventListener('submit', async (event) => {
            event.preventDefault(); // Evitar recarga de página

            const messageInput = form.querySelector('input[name="message"]');
            const message = messageInput.value.trim();

            if (message) {
                try {
                    // Enviar mensaje al servidor
                    const response = await fetch(window.location.href, {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                        body: new URLSearchParams({ message })
                    });

                    if (response.ok) {
                        const messageContainer = document.querySelector('.message-container');
                        const newMessage = document.createElement('div');
                        newMessage.className = 'message outgoing';
                        newMessage.textContent = message;

                        messageContainer.appendChild(newMessage);
                        messageInput.value = ''; // Limpiar campo
                        messageContainer.scrollTop = messageContainer.scrollHeight; // Desplazar al último mensaje
                    } else {
                        console.error('Error al enviar el mensaje.');
                    }
                } catch (error) {
                    console.error('Error de red:', error);
                }
            }
        });
    }
});

