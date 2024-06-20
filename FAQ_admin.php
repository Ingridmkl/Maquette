<?php
// Démarrer la session
session_start();

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
    <meta http-equiv="X-UA-Compatible="IE=edge">
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
        .login button{
            background-color: transparent;
            border: 1.7px solid black ;
            border-radius: 7px;
            color: black;
            cursor: pointer;
            padding: 10px;
            text-align: center;
            text-transform:uppercase ;
            transition: background-color 300ms;
            
        }

        .login button:hover{
            color: #fff;
            background-color: #000;

        }

    </style>
</head>
<body>
    <nav id="desktop-nav">
        <div class="logo">
            <img src="./Ressources/AU_DESIGN_LOGO noir.png" height="40%" width="40%">
        </div>
        <div>
            <ul class="login">
                <a href="deconnexion.php">
                    <button class="btn btn-color-2">Déconnexion</button>
                </a>
            </ul>
        </div>
    </nav>
    <h1 class="flex-center">Foire aux questions</h1>
    <br>

    <div class="faq" id="faq-section">
        <?php foreach ($faq_questions as $question): ?>
            <div class="details-container">
                <details data-id="<?php echo $question['ID']; ?>">
                    <summary><?php echo htmlspecialchars($question['question']); ?></summary>
                    <p><?php echo htmlspecialchars($question['answer']); ?></p>
                </details>
            </div>
        <?php endforeach; ?>
        
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
    <div>
        <a href="Administrateur.php">
            <button style=" width: 30%; display: inline-block; padding: 10px 20px; font-size: 16px; color: white; background-color: black; border: none; border-radius: 40px; text-align: center; cursor: pointer; margin-bottom: 100px; margin-left: 35%;">Retourner sur la page admin</button></a>
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
                    <li><a href="cgu-admin.php">CGU</a></li>
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

                const question = questionInput.value;
                const answer = answerInput.value;
                const action = isAdding ? 'add' : 'update';
                const id = isAdding ? null : currentDetails.dataset.id;

                const formData = new FormData();
                formData.append('action', action);
                formData.append('question', question);
                formData.append('answer', answer);
                if (id) {
                    formData.append('id', id);
                }

                fetch('faq-handler.php', {
                    method: 'POST',
                    body: formData
                }).then(response => response.text()).then(data => {
                    if (data.trim() === "Success") {
                        if (isAdding) {
                            const detailsContainer = document.createElement('div');
                            detailsContainer.className = 'details-container';

                            const details = document.createElement('details');
                            const summary = document.createElement('summary');
                            summary.textContent = question;
                            const p = document.createElement('p');
                            p.textContent = answer;

                            details.appendChild(summary);
                            details.appendChild(p);
                            detailsContainer.appendChild(details);
                            details.dataset.id = data.id; // Associez l'ID à l'élément details

                            faqSection.insertBefore(detailsContainer, document.getElementById('button-container'));
                            attachToggleEvent(details);
                        } else if (currentDetails) {
                            currentDetails.querySelector('summary').textContent = question;
                            currentDetails.querySelector('p').textContent = answer;
                        }

                        modifyForm.reset();
                        currentDetails = null;
                        deleteButton.style.display = 'none';
                        modifyFaqDiv.style.display = 'none';
                    } else {
                        console.error("Erreur: ", data);
                    }
                }).catch(error => console.error('Erreur:', error));
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
                    const id = currentDetails.dataset.id;

                    const formData = new FormData();
                    formData.append('action', 'delete');
                    formData.append('id', id);

                    fetch('faq-handler.php', {
                        method: 'POST',
                        body: formData
                    }).then(response => response.text()).then(data => {
                        if (data.trim() === "Success") {
                            faqSection.removeChild(currentDetails.parentElement);
                            modifyForm.reset();
                            currentDetails = null;
                            deleteButton.style.display = 'none';
                            modifyFaqDiv.style.display = 'none';
                        } else {
                            console.error("Erreur: ", data);
                        }
                    }).catch(error => console.error('Erreur:', error));
                }
            });

            deleteButton.style.display = 'none';
        });
    </script>
</body>
</html>
