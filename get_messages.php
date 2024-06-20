<?php
include 'Connexion_BDD.php'; // Inclure le fichier de connexion

$userId = $_GET['userId'];
$sql = "SELECT * FROM messages WHERE NumClient = $userId OR NumChat = $userId ORDER BY Date, Heure";
$result = $conn->query($sql);

$messages = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $messages[] = $row;
    }
}

$conn->close();
echo json_encode($messages);
?>
