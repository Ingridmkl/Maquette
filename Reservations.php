<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservations</title>
    <link rel="stylesheet" href="Reservations.css">
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
                <li><a href="index.html">Le produit</a></li>
                <li><a href="Search.php">Nos partenaires</a></li>
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
            <li><a href="index.html">Le produit</a></li>
            <li><a href="Search.php">Nos partenaires</a></li>
            <a href="PageConnexion.html">
                <button class="btn btn-color-2" >Connexion</button>
            </a>
        </div> 
    </nav>

    <?php
    // Vérifie si le paramètre nomRestaurant est défini dans l'URL
    if (isset($_GET['nomRestaurant'])) {
        $nomRestaurant = $_GET['nomRestaurant'];
    } else {
        $nomRestaurant = "Nom du restaurant non spécifié";
    }
    ?>

    <section id="booking">
        <div class="form-box">
            <form action="traitement_reservations.php" method="post">
                <p>Réservation</p>
                <div class="content">
                    <div class="box">
                        <input type="text" readonly value="<?php echo htmlspecialchars($nomRestaurant); ?>" name="restaurant">
                        <i class="fa-solid fa-shop"></i>
                    </div>
                    <div class="box">
                        <input type="text" placeholder="Nom" name="nom">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <div class="box">
                        <input type="text" placeholder="Prénom" name="prenom">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <div class="box">
                        <input type="email" placeholder="Email" name="email">
                        <i class="fa-solid fa-at"></i>
                    </div>
                    <div class="box">
                        <input type="number" placeholder="Nombre de personnes" name="nombre">
                        <i class="fa-solid fa-phone"></i>
                    </div>
                    <div class="box">
                        <input type="time" name="temps">
                    </div>
                    <div class="box">
                        <input type="date" name="date">
                        <!-- <i class="fa-solid fa-calendar-days"></i> -->
                    </div>
                    <p></p>
                    <button type="submit">Résever</button>
                </div>
            </form>
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