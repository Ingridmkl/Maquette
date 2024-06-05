<?php
    // Démarrer la session
    session_start();

    // Inclure le fichier de connexion à la base de données
    include 'Connexion_BDD.php';

    // Récupérer l'ID de l'utilisateur à supprimer
    $ID = $_GET['id'];

    // Supprimer l'utilisateur de la table 'restaurateur'
    $sql = "DELETE FROM restaurateur WHERE IDrestaurateur = '$ID'";
    $result = $conn->query($sql);

    // Supprimer le restaurant de l'utilisateur de la table 'restaurant'
    $sql2 = "DELETE FROM restaurant WHERE IDproprio = '$ID'";
    $result2 = $conn->query($sql2);

    if ($result === TRUE && $result2 === TRUE) {
        echo "<script>alert('Le compte et le restaurant ont été supprimés avec succès.'); window.location = 'Administrateur.php';</script>";
    } else {
        echo "<script>alert('Une erreur est survenue lors de la suppression du compte ou du restaurant.'); window.location = 'Administrateur.php';</script>";
    }

    $conn->close();
?>
