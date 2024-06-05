<?php
session_start();
include 'Connexion_BDD.php';

// Récupérer les données du formulaire
$adresse_etablissement = $_POST['adresse_etablissement'];
$nom_etablissement = $_POST['nom_etablissement'];
$site_web = $_POST['site_web'];
$proprietaire = $_SESSION['IDrestaurateur'];

// Gestion de l'upload de l'image
if (isset($_FILES['picture']) && $_FILES['picture']['error'] == UPLOAD_ERR_OK) {
    // Définir le dossier de destination
    $dossierDestination = './Ressources/';
    
    // Renommer l'image avec le nom de l'établissement et l'extension .png
    $nomImage = $nom_etablissement . '.jpg';
    $cheminImage = $dossierDestination . $nomImage;

    // Déplacer l'image téléchargée vers le dossier de destination
    if (move_uploaded_file($_FILES['picture']['tmp_name'], $cheminImage)) {
        // Préparer et exécuter la requête pour insérer les données dans la table 'restaurant'
        $sql_restaurant = "INSERT INTO restaurant (Adresse, Nom, SiteWeb, IDproprio, picture) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql_restaurant);
        $stmt->bind_param("sssis", $adresse_etablissement, $nom_etablissement, $site_web, $proprietaire, $cheminImage);
        $stmt->execute();

        if ($stmt->affected_rows === 1) {
            echo "<script>alert('Votre restaurant a bien été ajouté !'); window.location = 'http://localhost/Maquette/User.php';</script>";
        } else {
            echo "<script>alert('Une erreur est survenue lors de l'ajout de votre restaurant, veuillez recommencer.'); window.location = 'http://localhost/Maquette/User.php';</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('Erreur lors de l\'upload de l\'image.'); window.location = 'http://localhost/Maquette/User.php';</script>";
    }
} else {
    echo "<script>alert('Aucune image téléchargée ou erreur lors de l\'upload.'); window.location = 'http://localhost/Maquette/User.php';</script>";
}

$conn->close();
?>
