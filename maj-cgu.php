<?php
include 'Connexion_BDD.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $introduction = $_POST['introduction'];
    $mentions_legales = $_POST['mentions_legales'];
    $acces_site = $_POST['acces_site'];
    $collecte_donnees = $_POST['collecte_donnees'];
    $propriete_intellectuelle = $_POST['propriete_intellectuelle'];
    $responsabilite = $_POST['responsabilite'];
    $liens_hypertextes = $_POST['liens_hypertextes'];
    $publication_utilisateur = $_POST['publication_utilisateur'];

    $sql = "UPDATE cgu SET 
            introduction = ?, 
            mentions_legales = ?, 
            acces_site = ?, 
            collecte_donnees = ?, 
            propriete_intellectuelle = ?, 
            responsabilite = ?, 
            liens_hypertextes = ?, 
            publication_utilisateur = ? 
            WHERE id = 1";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param('ssssssss', 
            $introduction, 
            $mentions_legales, 
            $acces_site, 
            $collecte_donnees, 
            $propriete_intellectuelle, 
            $responsabilite, 
            $liens_hypertextes, 
            $publication_utilisateur
        );

        if ($stmt->execute()) {
            header("Location: cgu.php");
            echo "CGU mises à jour avec succès.";
        } else {
            echo "Erreur lors de la mise à jour des CGU : " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Erreur de préparation de la requête : " . $conn->error;
    }

    $conn->close();
}

?>

