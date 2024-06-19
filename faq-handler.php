<?php
session_start();

// Inclure le fichier de connexion à la base de données
include 'Connexion_BDD.php';

$action = $_POST['action'];
$question = $_POST['question'];
$answer = $_POST['answer'];
$id = isset($_POST['id']) ? $_POST['id'] : null;

if ($action === 'add') {
    $stmt = $conn->prepare("INSERT INTO faq (Question, Answer) VALUES (?, ?)");
    $stmt->bind_param("ss", $question, $answer);
} elseif ($action === 'update' && $id !== null) {
    $stmt = $conn->prepare("UPDATE faq SET Question = ?, Answer = ? WHERE ID = ?");
    $stmt->bind_param("ssi", $question, $answer, $id);
} elseif ($action === 'delete' && $id !== null) {
    $stmt = $conn->prepare("DELETE FROM faq WHERE ID = ?");
    $stmt->bind_param("i", $id);
} else {
    echo "Invalid action";
    exit;
}

if ($stmt->execute()) {
    echo "Success";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
