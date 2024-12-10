/* modifier les type choisis dans la table de ville pour le type des ville */
ALTER TABLE ville
MODIFY type ENUM('Capitale', 'Principale');
    /* Exécute */

/* modifier la langeur des varible nom de pays et ville  ,et la langeur de langues des pays */
ALTER TABLE pays
MODIFY nom VARCHAR(50);
ALTER TABLE pays
MODIFY langues VARCHAR(50);
ALTER TABLE ville
MODIFY nom VARCHAR(50);
    /* Exécute */


