<?php
// Démarrer la session
session_start();

// Inclure le fichier de connexion à la base de données
include 'Connexion_BDD.php';

// Récupérer l'ID de l'utilisateur à supprimer
$ID = $_GET['id'];
$nameResto = $_GET['name'];

// Supprimer le restaurant de l'utilisateur de la table 'restaurant'
$sql2 = "DELETE FROM restaurant WHERE IDproprio = '$ID' AND Nom = '$nameResto'";
$result2 = $conn->query($sql2);

if ($result2 === TRUE) {
    echo "<script>alert('Le restaurant a été supprimé avec succès.'); window.location = 'User.php';</script>";
} else {
    echo "<script>alert('Une erreur est survenue lors de la suppression du restaurant.'); window.location = 'User.php';</script>";
}

$conn->close();
?>
