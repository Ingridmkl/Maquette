function clickmenu(){
    const menu = document.querySelector(".menu-links");
    const icon = document.querySelector(".corps-icon");
    menu.classList.toggle("open");
    icon.classList.toggle("open");
}

const search = () =>{
    const searchbox = document.getElementById("search-item").value.toUpperCase();
    const items = document.getElementById("product-list")
    const product = document.querySelectorAll(".product")
    const pname = items.getElementsByTagName("h2")

    for(var i=0; i < pname.length;i++){
        let match = product[i].getElementsByTagName('h2')[0];

        if(match){
            let textvalue = match.textContent||match.innerHTML

            if(textvalue.toUpperCase().indexOf(searchbox) > -1){
                product[i].style.display = "";
            } else{
                product[i].style.display = "none";
            }
        }
    }
}

document.addEventListener('DOMContentLoaded', (event) => {
    console.log("JavaScript is loaded");

    // Sélectionner tous les éléments utilisateurs
    const users = document.querySelectorAll('.product');
    console.log(users); // Affiche tous les éléments .product trouvés

    // Ajouter un gestionnaire d'événements de clic pour chaque utilisateur
    users.forEach(user => {
        user.addEventListener('click', function() {
            console.log("User clicked", this); // Affiche l'élément cliqué

            // Récupérer les informations de l'utilisateur à partir des attributs data
            const userId = this.getAttribute('data-id');
            const userName = this.getAttribute('data-name');

            // Sélectionner la section de chat
            const chat = document.getElementById('chat');

            // Mettre à jour la section de chat avec les informations de l'utilisateur
            chat.innerHTML = `
                <div class="chat-header">
                    <h2>${userName}</h2>
                    <p>ID: ${userId}</p>
                </div>
                <div class="chat-body">
                    <!-- Contenu du chat ici -->
                </div>
            `;
        });
    });
});



function clickbutton(){
}