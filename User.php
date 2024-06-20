<?php session_start(); 
//include 'get_logs.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="User.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/dcfda6ef51.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="header">
        <div class="side-nav">
            <div class="user">
                <img src="user.jpg" class="user-img">
                <div class="id">
                    <h2><?php echo $_SESSION['prenom'] . " " . $_SESSION['nom']; ?></h2>
                    <p><?php echo $_SESSION['email']; ?></p>
                </div>
            </div>
            <ul>
                <li><a href="#anchor1"><p>Informations utilisateur</p></a></li>
                <li><a href="#anchor2"><p>Intensité sonore</p></a></li>
                <li><a href="#anchor3"><p>Paramètre du volume</p></a></li>
                <li><a href="#anchor4"><p>Qualité du son</p></a></li>
                <li><a href="#anchor5"><p>Paramètre de la musique</p></a></li>
                <li><a href="#anchor6"><p>Gestion des restaurants</p></a></li>
                <li><a href="messagerie_client.php"><p>Messagerie interne</p></a></li>
                <li><a href="#anchor7"><p>Modifier mon mot de passe</p></a></li>
            </ul>
        </div>
        <div class="right-content">
            <nav id="desktop-nav">
                <div class="logo">
                    <img src="./Ressources/AU_DESIGN_LOGO noir.png" height="40%" width="40%">
                </div>
                <?php echo "<div class='welcome_message'>Welcome to Optim'eat, " . $_SESSION['prenom'] . " " . $_SESSION['nom'] . " !</div>"; ?>
                <div>
                    <ul class="logout">
                        <a href="deconnexion.php">
                            <button class="btn btn-color-2">Déconnexion</button>
                        </a>
                    </ul>
                </div>
            </nav>
            <div class="dashboard">
                <div id="anchor1" class="info">
                    <h2>Informations utilisateur</h2>
                    <h3>Compte client numéro <?php echo $_SESSION['IDrestaurateur']; ?></h3>
                    <br>
                    <p>Nom: <?php echo $_SESSION['nom']; ?></p>
                    <p>Prénom: <?php echo $_SESSION['prenom']; ?></p>
                    <p>Email: <?php echo $_SESSION['email']; ?></p>
                </div>
                <div id="anchor2" class="graph">
                    <h2>Sonore Level by time</h2>
                    <canvas id="myCanvas"></canvas>
                    <script>
                                                                                

                        var canvas = document.getElementById('myCanvas');
                        var ctx = canvas.getContext('2d');
                        var data = {
                            labels: ['11:28', '11:29', '11:30', '11:31', '11:32', '11:33', '11:34', '11:35', '11:36', '11:37', '11:38', '11:39','11:40'],
                            datasets: [{
                                label: 'Niveau sonore',
                                data: [30, 30, 29, 24, 25, 28, 26, 41, 28, 27, 27, 28, 25],
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                borderColor: 'rgba(0, 0, 0, 1)',
                                borderWidth: 1
                            }]
                        };
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
                <div id="anchor3" class="parameters">
                    <div class="top-parameters">
                        <h2>Qualité du son</h2>
                        <p>Valeur actuelle (dBm) : <span id="current-value">--</span></p>
                    </div>
                </div>
                <script>
                function fetchLatestValue() {
                fetch('get_logs.php') // Remplacez par le chemin réel de votre script PHP
                .then(response => response.json())
                .then(data => {
                    if (data.length > 0) {
                        const latestValue = data[data.length - 1].value;
                        document.getElementById('current-value').textContent = latestValue;
                    }
                })
                .catch(error => console.error('Erreur:', error));
                }

        // Appelle fetchLatestValue toutes les 5 secondes
                setInterval(fetchLatestValue, 5000);
                fetchLatestValue(); // Appel initial pour charger la valeur immédiatement
                </script>
                <div id="anchor4" class="soundInfo">
                    <h2>Paramètres de la musique</h2>
                    <p>Ici, vous pouvez ajouter des contrôles pour ajuster le volume de la musique et choisir une playlist par thème (informateur qualité du son en direct + affichage sonore).</p>
                </div>
                <div id="anchor5" class="playlist">
                    <img src="./Ressources/staticPlaylistHTML.png" height="50%" width="50%">
                </div>
                <div id="anchor6" class="restoManagement">
                    <h2>Gestion de vos restaurants</h2>
                    <p><a href="AddResto.html" id="AddBtn">Ajouter</a></p>
                    <br>
                    <?php 
                    include 'Connexion_BDD.php'; 
                    $propriétaire = $_SESSION['IDrestaurateur'];
                    $sql = "SELECT Nom, Adresse, SiteWeb, picture FROM restaurant WHERE IDproprio = $propriétaire";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo '<img src="./Ressources/' . htmlspecialchars($row["Nom"]) . '.jpg" alt="Image de ' . htmlspecialchars($row["Nom"]) . '" style="width:150px; height:75px;">'; ?>
                            <div>
                                <a href="DeleteResto.php?id=<?= $_SESSION['IDrestaurateur'] ?>&name=<?= urlencode($row["Nom"]) ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce restaurant ?');" id="delBtn">Supprimer</a>
                                <p>Nom: <?php echo $row["Nom"]; ?></p>
                                <p>Adresse: <?php echo $row["Adresse"]; ?></p>
                                <p>SiteWeb: <?php echo $row["SiteWeb"]; ?></p>
                                <br>
                            </div>
                            <?php
                        }
                    } else {
                        echo "Vous n'avez mis aucun restaurant pour l'instant";
                    }
                    ?>
                </div>
                <div id="anchor7" class="mdp">
                    <h2>Modifier mon mot de passe</h2>
                    <p><a href="changeMdp.html" id="changeBtn">Modifier</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
