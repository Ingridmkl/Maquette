<?php
include 'Connexion_BDD.php';

// Récupérer les données du formulaire
$adresse_etablissement = $_POST['adresse_etablissement'];
$nom_etablissement = $_POST['nom_etablissement'];
$site_web = $_POST['site_web'];
$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$email = $_POST['email'];
$password = $_POST['password'];

// Insérer les données dans la table 'restaurant'
$sql_restaurant = "INSERT INTO restaurant (Adresse, Nom, SiteWeb) VALUES ('$adresse_etablissement', '$nom_etablissement', '$site_web')";
if ($conn->query($sql_restaurant) === TRUE) {
  echo "Nouvel établissement créé avec succès";
} else {
  echo "Erreur: " . $sql_restaurant . "<br>" . $conn->error;
}

// Insérer les données dans la table 'restaurateur'
$sql_restaurateur = "INSERT INTO restaurateur (Prénom, nom, email, mot_de_passe) VALUES ('$prenom', '$nom', '$email', '$password')";
if ($conn->query($sql_restaurateur) === TRUE) {
  echo "Nouveau restaurateur créé avec succès";
} else {
  echo "Erreur: " . $sql_restaurateur . "<br>" . $conn->error;
}

$conn->close();
?>