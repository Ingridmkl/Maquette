<?php
session_start();
include 'Connexion_BDD.php';

// Récupérer les données du formulaire
$newPassword = $_POST['newPassword'];
$proprio = $_SESSION['IDrestaurateur'];


// Cryptage du mot de passe
$hashed_password = password_hash($newPassword, PASSWORD_DEFAULT);

// Préparer et exécuter la requête pour mettre à jour le mot de passe dans la table 'restaurateur'
$sql_restaurateur = "UPDATE restaurateur SET mot_de_passe = ? WHERE IDrestaurateur = ?";
$stmt = $conn->prepare($sql_restaurateur);
$stmt->bind_param("si", $hashed_password, $proprio);
$stmt->execute();

// Vérifier si la mise à jour a réussi
if ($stmt->affected_rows === 1) {
    echo "<script>alert('Votre mot de passe a bien été modifié !'); window.location = 'http://localhost/Maquette/User.php';</script>";
} else {
    echo "<script>alert('Une erreur est survenue lors de la modification de votre mot de passe, veuillez réessayer.'); window.location = 'http://localhost/Maquette/User.php';</script>";
}

$stmt->close();
$conn->close();
?>
