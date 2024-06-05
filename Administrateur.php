<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Optim'eat</title>
    <link rel="stylesheet" href="Administrateur.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/dcfda6ef51.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <nav id="desktop-nav">
        <div class="logo">
            <img src="./Ressources/AU_DESIGN_LOGO noir.png" height="40%" width="40%">
        </div>
        <div>
            <ul class="logout">
                <a href="deconnexion.php">
                    <button class="btn btn-color-2">Déconnexion</button>
                </a>
            </ul>
        </div>
    </nav>
    <?php
    echo "<div class='welcome_message'>Welcome to Optim'eat, " . $_SESSION['prenom'] . " " . $_SESSION['nom'] . " !</div>";

    // Inclure le fichier de connexion à la base de données
    include 'Connexion_BDD.php';

    // Récupération des utilisateurs
    $query = $conn->query('SELECT Nom, Prénom, Email, Téléphone, IDrestaurateur FROM restaurateur');
    $restaurateurs = $query->fetch_all(MYSQLI_ASSOC);

    // Récupération des clients
    $query = $conn->query('SELECT Nom, Prénom, Email, Téléphone FROM client');
    $clients = $query->fetch_all(MYSQLI_ASSOC);
    ?>
    <div class="container">
        <h1>Gestion de la FAQ</h1>
        <div class="category">
            <p>
            Vous pouvez modifier, suuprimer ou enregistrer de nouvelles questions et réponses dans la FAQ
            <a href="#page de JD" id="delBtn">Modifier</a>
            </p>
        </div>
    </div>
    <div class="container">
        <h1>Gestion des CGU et mentions légales</h1>
        <div class="category">
            <p>
            Vous pouvez modifier, suuprimer ou enregistrer de nouvelles informations des las CGU et mentions légales
            <a href="#page de JD" id="delBtn">Modifier</a>
            </p>
        </div>
    </div>
    <div class="container">
        <h1>Gestion des comptes utilisateurs</h1>
        <div class="category">
            <h2>Restaurateurs</h2>
            <?php foreach ($restaurateurs as $restaurateur): ?>
                <p>Nom: <?= $restaurateur['Nom'] ?>
                <br>Prénom: <?= $restaurateur['Prénom'] ?>
                <br>Email: <?= $restaurateur['Email'] ?>
                <br>Téléphone: <?= $restaurateur['Téléphone'] ?>
                <a href="DeleteCompte.php?id=<?= $restaurateur['IDrestaurateur'] ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce compte ?');" id="delBtn">Supprimer</a>
                </p>
                <br>
            <?php endforeach; ?>
        </div>
        <div class="category">
            <h2>Clients</h2>
            <?php foreach ($clients as $client): ?>
                <p>Nom: <?= $client['Nom'] ?>
                <br>Prénom: <?= $client['Prénom'] ?>
                <br>Email: <?= $client['Email'] ?>
                <br>Téléphone: <?= $client['Téléphone'] ?></p>
                <br>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>