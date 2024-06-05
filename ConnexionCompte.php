<?php
    include 'Connexion_BDD.php';
    // Démarrer la session
    session_start();
    // Vérifier si le formulaire a été soumis
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
    
        // Préparer et exécuter la requête SQL pour vérifier si l'utilisateur est un administrateur
        $stmt_admin = $conn->prepare("SELECT IDadmin, Prénom, nom, Mot_de_passe FROM Administrateur WHERE Email=?");
        $stmt_admin->bind_param("s", $email);
        $stmt_admin->execute();
        $result_admin = $stmt_admin->get_result();
    
        if ($result_admin->num_rows > 0) {
            $admin = $result_admin->fetch_assoc();
            if (password_verify($password, $admin['Mot_de_passe'])) {
                $_SESSION['prenom'] = $admin['Prénom'];
                $_SESSION['nom'] = $admin['nom'];

                header('Location: Administrateur.php');
                exit();
            }
        }
    
        // Préparer et exécuter la requête SQL pour vérifier si l'utilisateur est un restaurateur
        $stmt = $conn->prepare("SELECT IDrestaurateur, Prénom, nom, mot_de_passe FROM restaurateur WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['mot_de_passe'])) {
                $IDrestaurateur = $user['IDrestaurateur'];
    
                // Préparer et exécuter la requête SQL pour obtenir les informations du restaurant
                $stmt_restaurant = $conn->prepare("SELECT Adresse, Nom, SiteWeb FROM restaurant WHERE Idresto = ?");
                $stmt_restaurant->bind_param("i", $IDrestaurateur);
                $stmt_restaurant->execute();
                $result_restaurant = $stmt_restaurant->get_result();
    
                if ($result_restaurant->num_rows > 0) {
                    $restaurant = $result_restaurant->fetch_assoc();
    
                    $_SESSION['prenom'] = $user['Prénom'];
                    $_SESSION['nom'] = $user['nom'];
                    $_SESSION['IDrestaurateur'] = $user['IDrestaurateur'];
                    $_SESSION['email'] = $_POST['email'];
                    $_SESSION['Adresse'] = $restaurant['Adresse'];
                    $_SESSION['Nom'] = $restaurant['Nom'];
                    $_SESSION['SiteWeb'] = $restaurant['SiteWeb'];
                    $_SESSION['mdp'] = $user['mot_de_passe']; // Utiliser le nouveau mot de passe
                }

                header('Location: User.php');
                exit();
            } else {
                echo "Le mot de passe est incorrect. Veuillez réessayer";
            }
        } else {
            echo "Il n'existe pas de compte ayant cette adresse mail. Veuillez réessayer";
        }
    } else {
        echo "Le formulaire n'a pas été soumis";
    }
    
    $conn->close();
?>
