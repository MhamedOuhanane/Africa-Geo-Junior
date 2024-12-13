
let ModulErreur = document.querySelector('#ModulErreur') || null;
if (ModulErreur != null) {
    ModulErreur.remove();
}

// conferme le message d'Erreur
let conferme = document.querySelector("#OK") || null;
if (conferme != null) {
    conferme.addEventListener("click" , () => {
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

