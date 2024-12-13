// L'affichage et cacher de Modul de Login
// document.getElementById("ModulLogin"):
ModulLogin.classList.add("hidden");

Loginbtn.addEventListener("click" , () => {
    document.querySelector('#ModulLogin > form').reset();
    ModulLogin.classList.toggle("hidden");
    document.body.classList.toggle("overflow-hidden");

    ModulLogin.addEventListener("click" , (element) => {
        if (!document.querySelector("#ModulLogin > form").contains(element.target)) {
            document.querySelector('#ModulLogin > form').reset();
            ModulLogin.classList.add("hidden");
        }
    });

});

// Les fonctions du page géographique
let Pays = document.querySelector('#Pays') || null;
let Villes = document.querySelector('#Villes') || null;
let Villebtn = document.querySelector('#Villebtn') || null;
let Continentbtn = document.querySelector('#Continentbtn') || null;
let Paysbtn = document.querySelector('#Paysbtn') || null;
// initialiser l'affichage et cacher des continaires
if (Pays != null) {
    Pays.classList.add("hidden");
}
if (Villes != null) {
    Villes.classList.add("hidden");
}

if (Continentbtn != null) {
    Continentbtn.addEventListener("click" , () => {
        Continents.classList.remove("hidden")
        Pays.classList.add("hidden");
        Villes.classList.add("hidden");
    });
}

if (Paysbtn != null) {
    Paysbtn.addEventListener("click" , () => {
        Continents.classList.add("hidden")
        Pays.classList.remove("hidden");
        Villes.classList.add("hidden");
    });
}

if (Villebtn != null) {
    Villebtn.addEventListener("click" , () => {
        Continents.classList.add("hidden")
        Pays.classList.add("hidden");
        Villes.classList.remove("hidden");
    });
}




if (Pays != null) {
    
}