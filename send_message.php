<?php
include 'Connexion_BDD.php'; // Inclure le fichier de connexion

$NumClient = $_POST['NumClient'];
$Message = $_POST['Message'];
$NumChat = $_POST['NumChat'];
$Date = date('Y-m-d');
$Heure = date('H:i:s');

// Insertion du message dans la base de données
$sql = "INSERT INTO messages (Admin, NumClient, NumChat, Message, Date, Heure) VALUES (1, $NumClient, $NumChat, '$Message', '$Date', '$Heure')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(['Message' => $Message, 'Heure' => $Heure, 'NumChat' => $NumChat]);
} else {
    http_response_code(500);
    echo json_encode(['error' => 'Erreur: ' . $sql . '<br>' . $conn->error]);
}

$conn->close();
?>
