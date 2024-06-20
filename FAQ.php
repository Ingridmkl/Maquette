<?php
// Inclure le fichier de connexion à la base de données
include 'Connexion_BDD.php';

// Récupérer les questions de la base de données
$sql = "SELECT ID, question, answer FROM faq";
$result = $conn->query($sql);
$faq_questions = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $faq_questions[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ</title>
    <link rel="stylesheet" href="FAQ.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
                <li><a href="#le produit">Le produit</a></li>
                <li><a href="Partenaires.html">Nos partenaires</a></li>
            </ul>
        </div>
    </nav>
    <h1 class="flex-center">Foire aux questions</h1>
    <br>

    <div class="faq">
        <?php foreach ($faq_questions as $question): ?>
            <div class="details-container">
                <details>
                    <summary><?php echo htmlspecialchars($question['question']); ?></summary>
                    <p><?php echo htmlspecialchars($question['answer']); ?></p>
                </details>
            </div>
        <?php endforeach; ?>
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
                    <li><a href="index.html">Accueil</a></li>
                    <li><a href="index.html">Le produit</a></li>
                    <li><a href="Search.php">Nos partenaires</a></li>
                    <li><a href="Page_A_propo.html">A propos de nous</a></li>
                    <li><a href="contact.html">Formulaire</a></li>
                    <li><a href="FAQ.php">FAQ</a></li>
                    <li><a href="cgu.php">CGU</a></li>
                </ul>
            </div>
            <div class="colb">
                <h3>Contactez-nous!</h3>
                <a href="https://www.instagram.com/groupe_audesign/"><i class="fa-brands fa-instagram"></i></a>
            </div>
        </div>
    </footer>

    <script>
        const allDetails = document.querySelectorAll('details');

        allDetails.forEach((details) => {
            details.addEventListener('toggle', (event) => {
                if (details.open) {
                    allDetails.forEach((otherDetails) => {
                        if (otherDetails !== details) {
                            otherDetails.open = false;
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>
