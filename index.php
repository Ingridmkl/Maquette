<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="design.css">
    <link rel="stylesheet" href="media.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/dcfda6ef51.js"></script>
</head>
<body>
    <nav id="desktop-nav">
        <div class="logo">
            <img src="./Ressources/AU_DESIGN_LOGO noir.png" height="40%" width="40%">
        </div>
        <div>
            <ul class="nav-links">
                <li><a href="index.php">Accueil</a></li>
                <li><a href="#menu-glissant-2">Le produit</a></li>
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
            <li><a href="index.php">Accueil</a></li>
            <li><a href="#menu-glissant-2">Le produit</a></li>
            <li><a href="Search.php">Nos partenaires</a></li>
            <a href="PageConnexion.html">
                <button class="btn btn-color-2" >Connexion</button>
            </a>
        </div> 
    </nav>
    <section id="menu-glissant-1">
        <div class="part1">
            <p>Optim'eat</p>
            <a href="#Titre"><button class="btn btn-color-2"> En savoir plus </button></a>
        </div>
    </section>
    <section id="menu-glissant-2">
        <div class="part2">
            <p id="Titre"> Description de notre produit. </p>
            <aside id="aside1">
                <p id="Titre1"> Optim'eat </p>
                <p id="corps"> 
                    Découvrez Optim'eat, notre solution pour améliorer l'expérience auditive au sein d'un réstaurant. <br>
                    Votre confort et bien-être sont notre priorité.
                </p>
                <img src="" alt="">
            </aside>
            <aside id="aside2">
                <p id="Titre1"> Nos capteurs </p>
                <p id="corps">
                    Des capteurs de son sont placés aux endroits stratégiques de la salle de restaurant.<br>
                    Grace aux mesures prises par ces capteurs, <br>
                    Nous sommes en capacité d'exploiter ces données afin de gérer automatiquement l'ambiance sonore en temps réel.<br>
                </p>
            </aside>

        </div>
    </section>
    <section id="Recherche">
    <h1>Nos Partenaires</h1>
    <div class="tamp">
        <form>
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" id="search-item" placeholder="Recherche partenaires">
        </form>
        <div class="product-list">
            <?php
            include 'Connexion_BDD.php';  // Assurez-vous que ce fichier configure correctement votre connexion à la base de données

            $sql = "SELECT Idresto, Nom, Adresse, SiteWeb FROM restaurant";  // Ajoutez Idresto à la requête
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="product">';
                    echo '<img src="./Ressources/' . htmlspecialchars($row["Nom"]) . '.jpg" alt="Image de ' . htmlspecialchars($row["Nom"]) . '">';
                    echo '<div class="p-details">';
                    echo '<h2>' . htmlspecialchars($row["Nom"]) . '</h2>';
                    echo '<h6>' . htmlspecialchars($row["Adresse"]) . '</h6>';
                    echo '</div>';
                    echo '<div class="reservation">';
                    $siteWeb = $row['SiteWeb'];
                    $siteWeb = str_replace('http://localhost/Maquette/', '', $siteWeb);
                    echo '<a href="https://www.' . htmlspecialchars($siteWeb) . '"><i class="fa-solid fa-utensils"></i></a>';
                    echo '<p class="top">Le Restaurant!</p>';
                    echo '<hr>';
                    echo '<a href="Reservations.php?nomRestaurant=' . urlencode($row["Nom"]) . '&id=' . $row["Idresto"] . '"><i class="fa-solid fa-calendar-days"></i></a>';
                    echo '<p class="bottom">Reserver!</p>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "<p>Aucun restaurant partenaire trouvé.</p>";
            }
            $conn->close();
            ?>
        </div>
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
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="#menu-glissant-2">Le produit</a></li>
                    <li><a href="#Recherche">Nos partenaires</a></li>
                    <li><a href="Page_A_propo.html">A propos de nous</a></li>
                    <li><a href="contact.html">Formulaire</a></li>
                    <li><a href="FAQ.html">FAQ</a></li>
                    <li><a href="cgu.php">CGU</a></li>
                    <li><a href="forum.php">Forum</a></li>
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


