/* modifier les type choisis dans la table de ville pour le type des ville */
ALTER TABLE ville
MODIFY type ENUM('Capitale', 'Principale');
    /* Exécute */

/* modifier la langeur des varible nom de pays et ville  ,et la langeur de langues des pays */
ALTER TABLE pays
MODIFY nom VARCHAR(100);
ALTER TABLE pays
MODIFY langues VARCHAR(100);
ALTER TABLE ville
MODIFY nom VARCHAR(100);
    /* Exécute */

/* Modifier la population de Maroc */
UPDATE pays
SET population = '37460000' WHERE nom = 'Maroc';

