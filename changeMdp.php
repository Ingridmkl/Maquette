<?php
session_start();
include 'Connexion_BDD.php';

// Vérifier si le formulaire a été soumis avec la méthode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si la clé 'newPassword' existe dans $_POST
    if (isset($_POST['newPassword'])) {
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
            echo "<script>alert('Votre mot de passe a bien été modifié !');window.location = 'http://localhost/Maquette/User.php';</script>";
        } else {
            echo "<script>alert('Une erreur est survenue lors de la modification de votre mot de passe, veuillez réessayer.');window.location = 'http://localhost/Maquette/User.php';</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('Le champ de nouveau mot de passe est requis.');</script>";
    }
}

$conn->close();
?>

