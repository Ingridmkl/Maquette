<?php
include 'Connexion_BDD.php'; // Inclure le fichier de connexion

$userId = $_GET['userId'];

// Récupérer les messages entre le client connecté et l'administrateur
$sql = "SELECT Message, NumChat, Heure FROM messages WHERE (NumClient = $userId AND Admin = 1) OR (NumClient = 1 AND NumChat = $userId) ORDER BY Date, Heure";
$result = $conn->query($sql);

$messages = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $messages[] = $row;
    }
}

echo json_encode($messages);

$conn->close();
?>
