<?php

//c'est le code pour faire le lien avec la bdd

$servername = "localhost";
$username = "root";   /*si jamais ça ne marche pas, essaye de remplacer root par ton prénom (Ingrid, JD, Louis, Eliott ou Victor) et ajoute en mot de passe : G9Cdatabase */
$password = "";
$dbname = "maquettedatabase";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//à chaque fois qu'une page web .html aura besoin d'utiliser la base de data, il faudra "l'appeler" avec : 
//<?php include 'Connexion_BDD.php'; point d'interrogation fermer le chevron

?>
