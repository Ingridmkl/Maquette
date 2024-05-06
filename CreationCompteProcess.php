<?php
include 'Connexion_BDD.php';

// Récupérer les données du formulaire
$adresse_etablissement = $_POST['adresse_etablissement'];
$nom_etablissement = $_POST['nom_etablissement'];
$site_web = $_POST['site_web'];
$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$email = $_POST['email'];
$telephone = $_POST['numTel'];
$password = $_POST['password'];


// Insérer les données dans la table 'restaurateur'
$sql_restaurateur = "INSERT INTO restaurateur (Prénom, nom, email, mot_de_passe, Téléphone) VALUES ('$prenom', '$nom', '$email', '$password', '$telephone')";
$restaurateurCreated = $conn->query($sql_restaurateur);

$proprietaire = $conn->insert_id;

// Insérer les données dans la table 'restaurant'
$sql_restaurant = "INSERT INTO restaurant (Adresse, Nom, SiteWeb, IDproprio) VALUES ('$adresse_etablissement', '$nom_etablissement', '$site_web','$proprietaire')";
$restaurantCreated = $conn->query($sql_restaurant);

if ($restaurantCreated === TRUE && $restaurateurCreated === TRUE) {
    echo "<script>alert('Votre compte a bien été créé ! Vous pouvez vous connecter !'); window.location = 'http://localhost/Maquette/PageConnexion.html';</script>";
} else {
    echo "<script>alert('Une erreur est survenue lors de la création de votre compte, veuillez recommencer.'); window.location = 'http://localhost/Maquette/PageCreationCompte.html';</script>";
}

$conn->close();
?>
