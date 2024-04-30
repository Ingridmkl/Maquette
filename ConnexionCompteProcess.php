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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
        $email = $conn->real_escape_string($_POST['email']);
        $password = $conn->real_escape_string($_POST['password']);
    
        $sql = "SELECT IDrestaurateur, Prénom, nom FROM restaurateur WHERE email = '$email' AND mot_de_passe = '$password'";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            $IDrestaurateur = $user['IDrestaurateur'];
    
            $sql_restaurant = "SELECT Adresse, Nom, SiteWeb FROM restaurant WHERE Idresto = '$IDrestaurateur'";
            $result_restaurant = $conn->query($sql_restaurant);
    
            if ($result_restaurant->num_rows > 0) {
                $restaurant = $result_restaurant->fetch_assoc();
    
                $_SESSION['prenom'] = $user['Prénom'];
                $_SESSION['nom'] = $user['nom'];
                $_SESSION['IDrestaurant'] = $user['IDrestaurateur'];
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['Adresse'] = $restaurant['Adresse'];
                $_SESSION['Nom'] = $restaurant['Nom'];
                $_SESSION['SiteWeb'] = $restaurant['SiteWeb'];
            }
            echo "<div class='welcome_message'>Welcome to Optim'eat, " . $user['Prénom'] . " " . $user['nom'] . " !</div>";
        } else {
            echo "Il n'existe pas de compte ayant cette adresse mail et ce mot de passe. Veuillez réessayer";
        }
    } else {
        echo "Le formulaire n'a pas été soumis";
    }
    
    $conn->close();
    ?>
    <div class="dashboard">
        <div class="user">
            <h2>Informations utilisateur</h2> <!--les informations seront transmises avec php, mais par soucis de manque de temps -->
            <h3>Compte client numéro <?php echo $_SESSION['IDrestaurant']; ?></h3> <!--modifier pour vadiable iduser !! à appeler sur php-->
            <p>Nom: <?php echo $_SESSION['nom']; ?></p>
            <p>Prénom: <?php echo $_SESSION['prenom']; ?></p>
            <p>Nom du restaurant: <?php echo $_SESSION['Nom']; ?></p>
            <p>Adresse du restaurant: <?php echo $_SESSION['Adresse']; ?></p>
            <p>Site web du restaurant: <?php echo $_SESSION['SiteWeb']; ?></p>
            <p>Email: <?php echo $_SESSION['prenom']; ?></p>
        </div>
        <div class="graph">
            <h2>Sonore Level by time</h2>
            <canvas id="myCanvas"></canvas>

    <script>
        var canvas = document.getElementById('myCanvas');
        var ctx = canvas.getContext('2d');

        // Définir les données de simulation pour le graphique
        var data = {
            labels: ['00:00', '01:00', '02:00', '03:00', '04:00', '05:00', '06:00', '07:00', '08:00', '09:00', '10:00', '11:00', '12:00'],
            datasets: [{
                label: 'Niveau sonore',
                data: [12, 19, 3, 5, 2, 3, 7, 8, 12, 15, 16, 18, 20],
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(0, 0, 0, 1)',
                borderWidth: 1
            }]
        };

        // Dessiner le graphique
        new Chart(ctx, {
            type: 'line',
            data: data,
            options: {
                responsive: true,
                scales: {
                    x: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Temps'
                        }
                    },
                    y: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Niveau sonore (dB)'
                        }
                    }
                }
            }
        });
    </script>
        </div>
        <div class="parameters">
            <div class="header">
                <h2>Qualité du son</h2>
                <p>Ici, vous pouvez afficher des informations sur la qualité du son en direct (paramètres son et autres).</p>
            </div>
            <div class="choice_alea">
                
                <p>Choix d'une thème aléatoire</p>
            </div>
            <div class="choice_predef">
                
                <p>Choix d'une thème prédéfini</p>
            </div>
        </div>
        <div class="soundInfo">
            <h2>Paramètres de la musique</h2>
            <p>Ici, vous pouvez ajouter des contrôles pour ajuster le volume de la musique et choisir une playlist par thème (informateur qualité du son en direct + affichage sonore).</p>
        </div>
        <div class="playlist">
            <img src="./Ressources/staticPlaylistHTML.png" height="100%" width="100%">
        </div>
    </div>
</body>
</html>
