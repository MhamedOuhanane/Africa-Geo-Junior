let inputs = document.querySelectorAll('input');
function VIDEINPUT(){
    inputs.forEach(Element => {
        if (Element.type != 'submit' && Element.type != 'button') {
            Element.value = "";
            console.log(Element);
            
        };
    });
};

// affiche la divesion pour ajouter un continent
continentBTN.onclick = () => {
    ADDContinent.classList.remove("hidden");
    AffContinents.classList.add("hidden");
    ADDPays.classList.add("hidden");
    AffPays.classList.add("hidden");
    ADDVille.classList.add("hidden");
    AffVilles.classList.add("hidden");
    VIDEINPUT();
};

// affiche la divesion pour ajouter un pays
paysBTN.onclick = () => {
    ADDContinent.classList.add("hidden");
    AffContinents.classList.add("hidden");
    ADDPays.classList.remove("hidden");
    AffPays.classList.add("hidden");
    ADDVille.classList.add("hidden");
    AffVilles.classList.add("hidden");
    VIDEINPUT();
};

// affiche la divesion pour ajouter une ville
villeBTN.onclick = () => {
    ADDContinent.classList.add("hidden");
    AffContinents.classList.add("hidden");
    ADDPays.classList.add("hidden");
    AffPays.classList.add("hidden");
    ADDVille.classList.remove("hidden");
    AffVilles.classList.add("hidden");
    VIDEINPUT();
};

// afficher les continents pour la page de service
Affichercontinentbtn.onclick = () => {
    ADDContinent.classList.remove("hidden");
    AffContinents.classList.toggle("hidden");
    ADDPays.classList.add("hidden");
    AffPays.classList.add("hidden");
    ADDVille.classList.add("hidden");
    AffVilles.classList.add("hidden");
    VIDEINPUT();
};

// afficher les pays pour la page de service
Afficherpaysbtn.onclick = () => {
    ADDContinent.classList.add("hidden");
    AffContinents.classList.add("hidden");
    ADDPays.classList.add("hidden");
    AffPays.classList.remove("hidden");
    ADDVille.classList.add("hidden");
    AffVilles.classList.add("hidden");
    VIDEINPUT();
};

// afficher les villes pour la page de service
Affichervillebtn.onclick = () => {
    ADDContinent.classList.add("hidden");
    AffContinents.classList.add("hidden");
    ADDPays.classList.add("hidden");
    AffPays.classList.add("hidden");
    ADDVille.classList.add("hidden");
    AffVilles.classList.remove("hidden");
    VIDEINPUT();
};