<?php
include 'Connexion_BDD.php';
// Démarrer la session
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //Affichage des données reçues du formulaire
    echo "Données reçues : <br>";
    var_dump($_POST);


    //On récupère les infos de la table reservations afin d'avoir l'id de la réservation
    $count = "SELECT COUNT(*) as count FROM réservation";
    $result_count = $conn->query($count);
    $row_count = $result_count->fetch_assoc();
    $nombre_reservations = $row_count["count"] + 1;

    // Récupération des données du formulaire
    $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
    $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $temps = isset($_POST['temps']) ? $_POST['temps'] : '';
    $date = isset($_POST['date']) ? $_POST['date'] : '';

    // Afficher les valeurs pour vérification
    echo "Nom: " . $nom . "<br>";
    echo "Prénom: " . $prenom . "<br>";
    echo "Email: " . $email . "<br>";
    echo "Nombre: " . $nombre . "<br>";
    echo "Temps: " . $temps . "<br>";
    echo "Date: " . $date . "<br>";

    // Insertion des données dans la table réservation
    $sql = "INSERT INTO réservation (IDreservation, Date, Heure, Nombre_de_personne) VALUES ($nombre_reservations, '$date', '$temps', $nombre)";
    
    if ($conn->query($sql) === TRUE) {
        echo "Réservation effectuée avec succès";
    } else {
        echo "Erreur lors de la réservation: " . $conn->error;
    }
    
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

$conn->close();
?>