<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CGU</title>
    <link rel="stylesheet" href="cgu.css">
    <link rel="stylesheet" href="media.css">
    <script src="https://kit.fontawesome.com/dcfda6ef51.js"></script>

</head>
<body>
    <nav id="desktop-nav">
        <div class="logo">
            <img src="./Ressources/AU_DESIGN_LOGO noir.png" height="40%" width="40%">
        </div>
        <div>
            <ul class="nav-links">
                <li><a class="nav-link" href="index.php">Accueil</a></li>
                <li><a class="nav-link" href="index.php">Le produit</a></li>
                <li><a class="nav-link" href="Search.php">Nos partenaires</a></li>
            </ul>
        </div>


    </nav>
    <div class="container">
    <?php
        // Inclure le fichier de connexion à la base de données
        include 'Connexion_BDD.php';

        // Récupérer les CGU depuis la base de données
        $sql = "SELECT * FROM cgu WHERE id = 1"; // Assurez-vous d'avoir un critère pour récupérer la bonne ligne
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        }
        ?>
        <div id="cgu-content">
            <h1>Conditions Générales d'Utilisation</h1>
            <section>
                <h2>1. Introduction</h2>
                <p id="introduction-text"><?php echo htmlspecialchars($row['introduction']); ?></p>
            </section>
            <section>
                <h2>2. Mentions légales</h2>
                <p id="mentions-legales-text"><?php echo htmlspecialchars($row['mentions_legales']); ?></p>
            </section>
            <section>
                <h2>3. Accès au site</h2>
                <p id="acces-site-text"><?php echo htmlspecialchars($row['acces_site']); ?></p>
            </section>
            <section>
                <h2>4. Collecte des données</h2>
                <p id="collecte-donnees-text"><?php echo htmlspecialchars($row['collecte_donnees']); ?></p>
            </section>
            <section>
                <h2>5. Propriété Intellectuelle</h2>
                <p id="propriete-intellectuelle-text"><?php echo htmlspecialchars($row['propriete_intellectuelle']); ?></p>
            </section>
            <section>
                <h2>6. Responsabilité</h2>
                <p id="responsabilite-text"><?php echo htmlspecialchars($row['responsabilite']); ?></p>
            </section>
            <section>
                <h2>7. Liens hypertextes</h2>
                <p id="liens-hypertextes-text"><?php echo htmlspecialchars($row['liens_hypertextes']); ?></p>
            </section>
            <section>
                <h2>8. Publication par l'Utilisateur</h2>
                <p id="publication-utilisateur-text"><?php echo htmlspecialchars($row['publication_utilisateur']); ?></p>
            </section>
        </div>
    </div>
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
                    <li><a href="index.php">Le produit</a></li>
                    <li><a href="#search">Nos partenaires</a></li>
                    <li><a href="Page_A_propo.html">A propos de nous</a></li>
                    <li><a href="contact.html">Formulaire</a></li>
                    <li><a href="FAQ.php">FAQ</a></li>
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