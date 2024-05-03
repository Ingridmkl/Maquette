<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos partenaires</title>
    <link rel="stylesheet" href="Search.css">
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
                <li><a href="#search">Nos partenaires</a></li>
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
            <li><a href="#search">Nos partenaires</a></li>
            <a href="PageConnexion.html">
                <button class="btn btn-color-2" >Connexion</button>
            </a>
        </div> 
    </nav>

    <section id="search">
        <h2 class="h2">Nos Restaurants Partenaires</h2>
        <div class="tamp">
            <form>
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" id="search-item" placeholder="Recherche partenaires" onkeyup="search()">
            </form>
            <div class="product-list" id="product-list">
                <?php
                include 'Connexion_BDD.php'; // Inclure le fichier de connexion

                $sql = "SELECT Idresto, Nom, Adresse, SiteWeb FROM restaurant";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // affichage des données de chaque ligne
                    while($row = $result->fetch_assoc()) {
                        $nomRestaurant = htmlspecialchars($row["Nom"]); // Stocker le nom du restaurant
                        echo '<div class="product">';
                        echo '<img src="./Ressources/' . htmlspecialchars($row["Nom"]) . '.jpg" alt="Image de ' . htmlspecialchars($row["Nom"]) . '">';
                        echo '<div class="p-details">';
                        echo '<h2>' . htmlspecialchars($row["Nom"]) . '</h2>';
                        echo '<h6>' . htmlspecialchars($row["Adresse"]) . '</h6>';
                        echo '</div>';
                        echo '<div class="reservation">';
                        echo '<a href="' . htmlspecialchars($row["SiteWeb"]) . '"><i class="fa-solid fa-utensils"></i></a>';
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
