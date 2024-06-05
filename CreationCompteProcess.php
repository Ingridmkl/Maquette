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

$hashed_password = password_hash($password, PASSWORD_DEFAULT); //cryptage du mdp

// Préparer et exécuter la requête pour insérer les données dans la table 'restaurateur'
$sql_restaurateur = "INSERT INTO restaurateur (Prénom, nom, email, mot_de_passe, Téléphone) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql_restaurateur);
$stmt->bind_param("sssss", $prenom, $nom, $email, $hashed_password, $telephone);
$stmt->execute();

$proprietaire = $conn->insert_id;

// Préparer et exécuter la requête pour insérer les données dans la table 'restaurant'
$sql_restaurant = "INSERT INTO restaurant (Adresse, Nom, SiteWeb, IDproprio) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql_restaurant);
$stmt->bind_param("sssi", $adresse_etablissement, $nom_etablissement, $site_web, $proprietaire);
$stmt->execute();

if ($stmt->affected_rows === 1) {
    echo "<script>alert('Votre compte a bien été créé ! Vous pouvez vous connecter !'); window.location = 'http://localhost/Maquette/PageConnexion.html';</script>";
} else {
    echo "<script>alert('Une erreur est survenue lors de la création de votre compte, veuillez recommencer.'); window.location = 'http://localhost/Maquette/PageCreationCompte.html';</script>";
}

$stmt->close();
$conn->close();
?>
