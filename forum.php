<?php

include 'Connexion_BDD.php';
if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $comment = $_POST["comment"];
    $date = strftime('%d %B %Y, %H:%M:%S');
    $reply_id = $_POST["reply_id"];
  
    $query = "INSERT INTO tb_data VALUES('', '$name', '$comment', '$date', '$reply_id')";
    mysqli_query($conn, $query);
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>
    <link rel="stylesheet" href="forum.css">
    <script src="forum.js"></script>
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
    <div class="container">
        <?php
        $datas = mysqli_query($conn, "SELECT * FROM tb_data WHERE reply_id = 0");
        foreach($datas as $data) {
            require 'comment.php';
          }
        ?>
        <form action = "" method = "post">
            <h2 id = "title">Laissez un commentaire</h2>
            <input type="hidden" name="reply_id" id="reply_id">
            <input type="text" name="name" placeholder="Your name">
            <br>
            <textarea name="comment" placeholder="Your comment"></textarea>
            <br>
            <button class = "submit" type="submit" name="submit">Envoyer</button>
        </form>
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
</body>
</html>