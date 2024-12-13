
let ModulErreur = document.querySelector('#ModulErreur') || null;

// conferme le message d'Erreur
let OK = document.querySelector("#OK") || null;
if (OK != null) {
    OK.addEventListener("click" , () => {
        console.log('A3');
        ModulErreur.remove();
        ModulLogin.classList.toggle("hidden");
        document.body.classList.toggle("overflow-hidden");
        
        // Annulation d'affichage du ModulLogin
        ModulLogin.addEventListener("click" , (element) => {
            if (!document.querySelector("#ModulLogin > form").contains(element.target)) {
                document.querySelector('#ModulLogin > form').reset();
                ModulLogin.classList.add("hidden");
            }
        });
    });
};