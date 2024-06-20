<?php
session_start();
include 'Connexion_BDD.php'; // Inclure le fichier de connexion

$clientId = $_SESSION['IDrestaurateur'];
$clientName = $_SESSION['prenom'] . ' ' . $_SESSION['nom'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos partenaires</title>
    <link rel="stylesheet" href="messagerie_client.css">
    <script src="https://kit.fontawesome.com/dcfda6ef51.js"></script>
</head>
<body>
    <section id="search">
        <h2 class="h2">Messagerie</h2>
        <div class="container">
            <div class="tamp">
                <i class="fa-solid fa-user"></i>
                <h2><?php echo htmlspecialchars($clientName); ?></h2>
                <p>ID: <?php echo htmlspecialchars($clientId); ?></p>
            </div>
            <div class="chat" id="chat">
                <div class="chat-header">
                    <i class="fa-solid fa-user-gear"></i>
                    <h2>Admin</h2>
                </div>
                <div class="chat-body" id="chat-body">
                    <div id="messages-container"></div>
                </div>
                <footer class="chat-footer">
                    <form id="message-form">
                        <input type="hidden" name="NumClient" value="<?php echo htmlspecialchars($clientId); ?>">
                        <input type="text" name="Message" placeholder="Écrivez votre message...">
                        <button type="submit"><i class="fa-solid fa-paper-plane"></i></button>
                    </form>
                </footer>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', async function() {
            const userId = <?php echo json_encode($clientId); ?>;
            const messagesContainer = document.getElementById('messages-container');

            // Fetch messages via AJAX
            try {
                const response = await fetch('get_messages_client.php?userId=' + userId);
                const messages = await response.json();

                let messagesHTML = messages.map(message => `
                    <div class="message ${message.NumChat == userId ? 'blue' : 'grey'}">
                        <p>${message.Message}</p>
                        <span>${message.Heure}</span>
                    </div>
                `).join('');

                messagesContainer.innerHTML = messagesHTML;
            } catch (error) {
                console.error('Error fetching messages:', error);
            }

            // Ajouter un gestionnaire d'événements pour le formulaire de message
            document.getElementById('message-form').addEventListener('submit', async function(event) {
                event.preventDefault();
                const formData = new FormData(this);
                formData.append('NumChat', userId != 1 ? 1 : userId);

                try {
                    const response = await fetch('send_message_client.php', {
                        method: 'POST',
                        body: formData
                    });

                    if (response.ok) {
                        const newMessage = await response.json();

                        let newMessageHTML = `
                            <div class="message ${newMessage.NumChat == userId ? 'blue' : 'grey'}">
                                <p>${newMessage.Message}</p>
                                <span>${newMessage.Heure}</span>
                            </div>
                        `;
                        messagesContainer.insertAdjacentHTML('beforeend', newMessageHTML);
                        this.reset();
                    } else {
                        console.error('Failed to send message');
                    }
                } catch (error) {
                    console.error('Error sending message:', error);
                }
            });
        });
    </script>
</body>
</html>
