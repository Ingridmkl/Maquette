<?php
    include 'Connexion_BDD.php';
    // Démarrer la session
    session_start();
    // Vérifier si le formulaire a été soumis
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $conn->real_escape_string($_POST['email']);
        $password = $conn->real_escape_string($_POST['password']);
    
        // Ajouter une requête SQL pour vérifier si l'utilisateur est un administrateur
        $sql_admin = "SELECT IDadmin, Prénom, nom FROM Administrateur WHERE Email='$email' AND Mot_de_passe='$password'";
        $result_admin = $conn->query($sql_admin);
    
        if ($result_admin->num_rows > 0) {
            // Si l'utilisateur est un administrateur, redirigez-le vers Administrateur.php
            $admin = $result_admin->fetch_assoc();
            $_SESSION['prenom'] = $admin['Prénom'];
            $_SESSION['nom'] = $admin['nom'];

            header('Location: Administrateur.php');
            exit();
        }
    
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

            header('Location: User.php');
            exit();

        } else {
            echo "Il n'existe pas de compte ayant cette adresse mail et ce mot de passe. Veuillez réessayer";
        }
    } else {
        echo "Le formulaire n'a pas été soumis";
    }
    
    $conn->close();
?>