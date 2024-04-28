<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Optim'eat</title>
    <link rel="stylesheet" href="ProcessDesign.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/dcfda6ef51.js"></script>
</head>
<body>
<nav id="desktop-nav">
        <div class="logo">
            <img src="./Ressources/AU_DESIGN_LOGO noir.png" height="40%" width="40%">
        </div>
        <div>
            <ul class="logout">
                <a href="PageConnexion.html">
                    <button class="btn btn-color-2">Déconnexion</button>
                </a>
            </ul>
        </div>
    </nav>
    <?php
include 'Connexion_BDD.php';

// Démarrer la session
session_start();

// Vérifier si le formulaire a été soumis
if (isset($_POST['email']) && isset($_POST['password'])) {
    // Le formulaire a été soumis, vous pouvez accéder à $_POST['email'] et $_POST['password']
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Sécuriser la requête SQL contre les injections SQL
    $email = $conn->real_escape_string($email);
    $password = $conn->real_escape_string($password);

    // Requête SQL pour récupérer les informations de l'utilisateur
    $sql = "SELECT Prénom, nom FROM restaurateur WHERE email = '$email' AND mot_de_passe = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // L'utilisateur existe, démarrer une session
        $user = $result->fetch_assoc();
        $_SESSION['prenom'] = $user['Prénom'];
        $_SESSION['nom'] = $user['nom'];
    ?>
        <div class="welcome_message">
        <?php echo "Welcome to Optim'eat " . $user['Prénom'] . " " . $user['nom'] . " !" ; ?>
        </div>
    <?php
    } else {
        // L'utilisateur n'existe pas, afficher un message d'erreur
        echo "Il n'existe pas de compte ayant cette adresse mail et ce mot de passe. Veuillez réessayer";
    }
} else {
    // Le formulaire n'a pas été soumis
    echo "Le formulaire n'a pas été soumis";
}

$conn->close();
?>
</body>
</html>
