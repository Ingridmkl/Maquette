<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservations</title>
    <link rel="stylesheet" href="traitement_reservations.css"> 
    <script src="https://kit.fontawesome.com/dcfda6ef51.js"></script>
</head>
<body>
    <nav id="desktop-nav">
        <div class="logo">
            <img src="./Ressources/AU_DESIGN_LOGO noir.png" height="40%" width="40%">
        </div>
        <div>
            <ul class="nav-links">
                <li><a href="index.html">Accueil</a></li>
                <li><a href="#menu-glissant-2">Le produit</a></li>
                <li><a href="#nos partenaires">Nos partenaires</a></li>
            </ul>
        </div>
        <div>
            <ul class="login">
                <a href="PageConnexion.html">
                    <button class="btn btn-color-2">Connexion</button>
                </a>
            </ul>
        </div>
    </nav>
    <nav id="corps-nav">
        <div class="logo">
            <img src="./Ressources/AU_DESIGN_LOGO noir.png" height="40%" width="40%">
        </div>
        <div class="corps-menu">
            <div class="corps-icon" onclick="clickmenu()">
            <span></span>
            <span></span>
            <span></span>
            </div>
        </div>
        <div class="menu-links">
            <li><a href="index.html">Accueil</a></li>
            <li><a href="#menu-glissant-2">Le produit</a></li>
            <li><a href="#nos partenaires">Nos partenaires</a></li>
            <a href="PageConnexion.html">
                <button class="btn btn-color-2" >Connexion</button>
            </a>
        </div> 
    </nav>

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

    <section id="recap">
        <div class="recap-box">
            <p class="text1">Bonjour <?php echo $_POST['nom']; ?> <?php echo $_POST['prenom']; ?>!</p>
            <p class="text2">Merci d'avoir réservé chez nous.</p>
            <p class="text2">Vous trouverez ci-dessous le récapitulatif de votre réservation.</p>
        </div>
    </section>

    <footer>
        <div class="footer-container">
            <div class="col">
                <img src="./Ressources/AUDESIGN LOGO blanc.png" class="audesign-logo">
            </div>
            <div class="col">
                <h3>A propos de</h3>
                <p>ISEP,</p>
                <p>10 Rue de Vanves,</p>
                <p>92130, Issy-les-Moulineaux.</p>
            </div>
            <div class="col">
                <h3>Raccourcis</h3>
                <ul>
                    <li><a href="index.html">Accueil</a></li>
                    <li><a href="index.html">Le produit</a></li>
                    <li><a href="#search">Nos partenaires</a></li>
                    <li><a href="Page_A_propo.html">A propos de nous</a></li>
                    <li><a href="contact.html">Formulaire</a></li>
                    <li><a href="FAQ.html">FAQ</a></li>
                </ul>
            </div>
            <div class="colb">
                <h3>Contactez-nous!</h3>
                <a href="https://www.instagram.com/groupe_audesign/"><i class="fa-brands fa-instagram"></i></a>
            </div>
        </div>
    </footer>
    <script src="Script.js"></script>
</body>
</html>
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