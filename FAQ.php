<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ</title>
    <link rel="stylesheet" href="FAQ.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap' rel="stylesheet">
    <script src="https://kit.fontawesome.com/dcfda6ef51.js"></script>
    <style>
        
        #button-container {
            display: flex;
            gap: 10px; 
        }

        #add-question-button, #modify-button {
            margin: 20px auto; 
            display: block; 
            padding: 10px 20px;
            border: 2px solid black; 
            border-radius: 8px;
            background-color: white;
            color: black;
            cursor: pointer;
            font-family: "Poppins", sans-serif;
            font-weight: 600;
            transition: all 0.3s ease; 
        }

        #add-question-button:hover, #modify-button:hover {
            background-color: black;
            color: white;
        }

        
    </style>
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

    <div class="faq" id="faq-section">

        <div class="details-container"> 
            <details>
                <summary>Qui sommes-nous ?</summary>
                <p>Nous sommes Audesign, une start-up formée par de jeunes ingénieurs, spécialisée dans la conception de solutions pour la gestion et l'optimisation du son.</p>
                <img src="./Ressources/AUDESIGN LOGO.png" alt="Logo d'Audesign" class="centered">
                <br>
            </details>
        </div>
    
        <div class="details-container">
            <details>
                <summary>Optim'Eat : qu'est-ce que c'est ?</summary>
                <p class="scrollable">Optim'Eat est une solution d'Audesign pour une gestion efficace de la qualité sonore, spécialement adaptée aux besoins des restaurants. 
                    Il intègre des capteurs avancés, un traitement intelligent des données et une interface conviviale pour contrôler l'ambiance sonore en temps réel. 
                    <br>
                    <img src="./Ressources/capteurs.jpg" alt="Logo d'Audesign" class="centered">
                    <br><br>
                    Les restaurateurs peuvent ajuster les niveaux sonores, programmer des ambiances et même analyser l'environnement sonore pour maintenir une atmosphère optimale. 
                    <br>
                    <img src="./Ressources/boitier.jpg" alt="Capteurs sonores" class="centered">
                    <br>
                    Optim'Eat offre une solution moderne et flexible pour améliorer l'expérience des clients tout en simplifiant la gestion sonore pour les restaurateurs.
                </p>
            </details>
        </div>
    
        <div class="details-container">
            <details>
                <summary>Quel type de paiement ?</summary>
                <p>Optim'Eat est proposé sous forme d'abonnement annuel, permettant aux clients de bénéficier de notre solution de gestion sonore de manière continue avec des paiements récurrents chaque année.</p>
            </details>
        </div>
    
        <div class="details-container">
            <details>
                <summary>Comment obtenir Optim'Eat ?</summary>
                <p>Pour obtenir Optim'Eat, vous pouvez vous inscrire et souscrire à notre abonnement annuel via notre plateforme en ligne ou en nous contactant directement. Une équipe de techniciens sera déployée pour installer les capteurs dans votre restaurant et configurer le dispositif.
                    <br><br>
                    <img src="./Ressources/technicienne.jpg" alt="Restaurant" class="centered">
                    <br>
                </p>
            </details>
        </div>
    
        <div class="details-container">
            <details>
                <summary>Comment puis-je annuler mon offre ?</summary>
                <p>Pour annuler votre offre Optim'Eat, vous pouvez nous contacter par téléphone ou par e-mail. Des frais d'annulation peuvent s'appliquer si vous résiliez avant la fin de votre période contractuelle. Pour plus d'informations, veuillez consulter <a href="cgu.html">nos conditions générales</a>.</p>
            </details>
        </div>
    
        <div class="details-container">
            <details>
                <summary>Optim'Eat est-il adapté à mon restaurant ?</summary>
                <p>Optim'Eat est conçu pour s'adapter à une large gamme de restaurants, des petits bistrots aux grands établissements. 
                    <br><br>
                    <img src="./Ressources/doubleResto.jpeg" alt="Restaurant" class="centered">
                    <br>
                    Pour savoir s'il vous convient, contactez-nous pour une consultation personnalisée.
                </p>
            </details>
        </div>

    
        
        <div id="button-container">
            <button id="add-question-button">Ajouter</button>
            <button id="modify-button">Modifier</button>
        </div>

    </div>

    <div class="modify-faq" id="modify-faq">
        <h3 id="modify-title">Ajouter une question</h3>
        <form id="modify-faq-form">
            <label for="question">Question :</label><br>
            <input type="text" id="question" name="question" required><br><br>
            <label for="answer">Réponse :</label><br>
            <textarea id="answer" name="answer" required></textarea><br><br>
            <button type="submit" id="add-button">Ajouter</button>
            <button type="button" id="delete-button" style="display: none;">Supprimer</button>
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
                    <li><a href="index.html">Accueil</a></li>
                    <li><a href="index.html">Le produit</a></li>
                    <li><a href="Partenaires.html">Nos partenaires</a></li>
                    <li><a href="Page_A_propo.html">A propos de nous</a></li>
                    <li><a href="contact.html">Formulaire</a></li>
                    <li><a href="FAQ.php">FAQ</a></li>
                    <li><a href="cgu.html">CGU</a></li>
                </ul>
            </div>
            <div class="colb">
                <h3>Contactez-nous!</h3>
                <a href="https://www.instagram.com/groupe_audesign/"><i class="fa-brands fa-instagram"></i></a>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const faqSection = document.getElementById('faq-section');
            const modifyForm = document.getElementById('modify-faq-form');
            const modifyFaqDiv = document.getElementById('modify-faq');
            const addQuestionButton = document.getElementById('add-question-button');
            const modifyButton = document.getElementById('modify-button');
            const questionInput = document.getElementById('question');
            const answerInput = document.getElementById('answer');
            const deleteButton = document.getElementById('delete-button');
            const modifyTitle = document.getElementById('modify-title');
            const addButton = document.getElementById('add-button');

            let currentDetails = null;
            let isAdding = false;

            function attachToggleEvent(details) {
                details.addEventListener('toggle', function(event) {
                    if (details.open) {
                        const allDetails = document.querySelectorAll('details');
                        allDetails.forEach((otherDetails) => {
                            if (otherDetails !== details) {
                                otherDetails.open = false;
                            }
                        });
                    }
                });
            }

            function initializeToggleEvents() {
                const allDetails = document.querySelectorAll('details');
                allDetails.forEach((details) => {
                    attachToggleEvent(details);
                });
            }

            initializeToggleEvents();

            addQuestionButton.addEventListener('click', function() {
                modifyTitle.textContent = "Ajouter une question";
                modifyForm.reset();
                addButton.textContent = "Ajouter";
                currentDetails = null;
                deleteButton.style.display = 'none';
                modifyFaqDiv.style.display = 'block';
                isAdding = true;
            });

            modifyButton.addEventListener('click', function() {
                modifyTitle.textContent = "Modifier une question";
                addButton.textContent = "Modifier";
                modifyForm.reset();
                currentDetails = null;
                deleteButton.style.display = 'none';
                modifyFaqDiv.style.display = 'block';
                isAdding = false;
            });

            modifyForm.addEventListener('submit', function(event) {
                event.preventDefault();

                if (isAdding) {
                    const detailsContainer = document.createElement('div');
                    detailsContainer.className = 'details-container';

                    const details = document.createElement('details');
                    const summary = document.createElement('summary');
                    summary.textContent = questionInput.value;
                    const p = document.createElement('p');
                    p.textContent = answerInput.value;

                    details.appendChild(summary);
                    details.appendChild(p);
                    detailsContainer.appendChild(details);

            
                    faqSection.insertBefore(detailsContainer, document.getElementById('button-container'));
                    attachToggleEvent(details);
                } else if (currentDetails) {
                    currentDetails.querySelector('summary').textContent = questionInput.value;
                    currentDetails.querySelector('p').textContent = answerInput.value;
                }

                modifyForm.reset();
                currentDetails = null;
                eleteButton.style.display = 'none';
                modifyFaqDiv.style.display = 'none';
            });

            faqSection.addEventListener('click', function(event) {
                if (!isAdding && event.target.tagName.toLowerCase() === 'summary') {
                    currentDetails = event.target.parentElement;
                    questionInput.value = event.target.textContent;
                    answerInput.value = currentDetails.querySelector('p').textContent;
                    deleteButton.style.display = 'inline';
                }
            });

            deleteButton.addEventListener('click', function() {
                if (currentDetails) {
                    faqSection.removeChild(currentDetails.parentElement);
                    modifyForm.reset();
                    currentDetails = null;
                    deleteButton.style.display = 'none';
                    modifyFaqDiv.style.display = 'none';
                }
            });

            deleteButton.style.display = 'none';
        });

    </script>
</body>
</html>