
let ModulErreur = document.querySelector('#ModulErreur') || null;

// conferme le message d'Erreur
let OK = document.querySelector("#OK") || null;
if (OK != null) {
    OK.addEventListener("click" , () => {
        ModulErreur.remove();
        
        // Annulation d'affichage du ModulLogin
        ModulLogin.addEventListener("click" , (element) => {
            if (!document.querySelector("#ModulLogin > form").contains(element.target)) {
                document.querySelector('#ModulLogin > form').reset();
                ModulLogin.classList.remove("z-10");
                ModulLogin.classList.add("-z-10");
                document.body.classList.remove("overflow-hidden");
            }
        });
    });
};