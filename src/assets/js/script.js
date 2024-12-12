// L'affichage et cacher de Modul de Login
// document.getElementById("ModulLogin").
ModulLogin.classList.add("hidden");

Loginbtn.addEventListener("click" , () => {
    
    ModulLogin.classList.toggle("hidden");
    document.body.classList.toggle("overflow-hidden");

    ModulLogin.addEventListener("click" , (element) => {
        if (!document.querySelector("#ModulLogin > form").contains(element.target)) {
            ModulLogin.classList.add("hidden");
        }
    });

});

                // Les fonctions du page géographique
// initialiser l'affichage et cacher des continaires
Pays.classList.add("hidden");
Villes.classList.add("hidden");

Continentbtn.addEventListener("click" , () => {
    Continents.classList.remove("hidden")
    Pays.classList.add("hidden");
    Villes.classList.add("hidden");
});

Paysbtn.addEventListener("click" , () => {
    Continents.classList.add("hidden")
    Pays.classList.remove("hidden");
    Villes.classList.add("hidden");
});

Villebtn.addEventListener("click" , () => {
    Continents.classList.add("hidden")
    Pays.classList.add("hidden");
    Villes.classList.remove("hidden");
});





