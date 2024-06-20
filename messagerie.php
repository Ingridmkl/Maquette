<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos partenaires</title>
    <link rel="stylesheet" href="messagerie.css">
    <script src="https://kit.fontawesome.com/dcfda6ef51.js"></script>
</head>
<body>
    <section id="search">
        <h2 class="h2">messagerie</h2>
        <div class="container">
            <div class="tamp">
                <i class="fa-solid fa-user-gear"></i>
                <!-- Affichage ID de l'Administrateur 
                <div class="admin-info">
                    <p><?php echo $_SESSION['prenom'] . ' ' . $_SESSION['nom']; ?>!</p>
                </div>
                -->
                <form id="forum">
                    <input type="text" id="search-item" placeholder="Recherche partenaires" onkeyup="search()">
                </form>
                <form id="reg" action="messagerie.php" method="post">
                    <div class="product-list" id="product-list">
                        <?php
                        include 'Connexion_BDD.php'; // Inclure le fichier de connexion

                        $sql = "SELECT IDrestaurateur, Nom, Prénom FROM restaurateur";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // affichage des données de chaque ligne
                            while($row = $result->fetch_assoc()) {
                                echo '<div class="product" data-id="'.htmlspecialchars($row["IDrestaurateur"]).'" data-name="'.htmlspecialchars($row["Prénom"]). ' ' .htmlspecialchars($row["Nom"]).'" >';
                                echo '<div class="user">';
                                echo '<i class="fa-solid fa-user"></i>';
                                echo '<h4>' .'id° '. htmlspecialchars($row["IDrestaurateur"]) . '</h4>';
                                echo '</div>';
                                echo '<div class="p-details">';
                                echo '<h2>' . htmlspecialchars($row["Prénom"]) . ' ' . htmlspecialchars($row["Nom"]) . '</h2>';
                                echo '</div>';
                                echo '</div>';
                            }
                        } else {
                            echo "<p>Aucun utilisateur trouvé.</p>";
                        }
                        $conn->close();
                        ?>
                    </div>
                </form>
            </div>
            <div class="chat" id="chat">
            </div>
        </div>
    </section>
    <script>
        const search = () => {
            const searchbox = document.getElementById("search-item").value.toUpperCase();
            const items = document.getElementById("product-list");
            const product = document.querySelectorAll(".product");
            const pname = items.getElementsByTagName("h2");

            for (var i = 0; i < pname.length; i++) {
                let match = product[i].getElementsByTagName('h2')[0];

                if (match) {
                    let textvalue = match.textContent || match.innerHTML;

                    if (textvalue.toUpperCase().indexOf(searchbox) > -1) {
                        product[i].style.display = "";
                    } else {
                        product[i].style.display = "none";
                    }
                }
            }
        }

        document.addEventListener('DOMContentLoaded', (event) => {
            console.log("JavaScript is loaded");

            // Sélectionner tous les éléments utilisateurs
            const users = document.querySelectorAll('.product');
            console.log(users); // Affiche tous les éléments .product trouvés

            // Ajouter un gestionnaire d'événements de clic pour chaque utilisateur
            users.forEach(user => {
                user.addEventListener('click', async function() {
                    console.log("User clicked", this); // Affiche l'élément cliqué

                    // Récupérer les informations de l'utilisateur à partir des attributs data
                    const userId = this.getAttribute('data-id');
                    const userName = this.getAttribute('data-name');

                    // Sélectionner la section de chat
                    const chat = document.getElementById('chat');

                    // Mettre à jour la section de chat avec les informations de l'utilisateur
                    let chatHeader = `
                        <div class="chat-header">
                            <i class="fa-solid fa-user"></i>
                            <h2>${userName}</h2>
                            <p>ID: ${userId}</p>
                        </div>
                        <div class="chat-body" id="chat-body">
                            <div id="messages-container"></div>
                        </div>
                        <footer class="chat-footer">
                            <form id="message-form">
                                <input type="hidden" name="NumClient" value="${userId}">
                                <input type="text" name="Message" placeholder="Ecrivez votre message...">
                                <button type="submit"><i class="fa-solid fa-paper-plane"></i></button>
                            </form>
                        </footer>
                    `;
                    chat.innerHTML = chatHeader;

                    // Fetch messages via AJAX
                    try {
                        const response = await fetch('get_messages.php?userId=' + userId);
                        const messages = await response.json();

                        let messagesContainer = document.getElementById('messages-container');
                        let messagesHTML = messages.map(message => `
                            <div class="message ${message.NumChat == 1 ? 'grey' : 'blue'}">
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

                        // Ajouter NumChat en fonction de l'ID utilisateur
                        const userId = document.querySelector('.chat-header p').textContent.split(': ')[1];
                        const NumChat = userId != 1 ? 1 : userId;
                        formData.append('NumChat', NumChat);

                        try {
                            const response = await fetch('send_message.php', {
                                method: 'POST',
                                body: formData
                            });

                            if (response.ok) {
                                const newMessage = await response.json();

                                let messagesContainer = document.getElementById('messages-container');
                                let newMessageHTML = `
                                    <div class="message ${newMessage.NumChat == 1 ? 'grey' : 'blue'}">
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
            });
        });
    </script>
</body>
</html>
