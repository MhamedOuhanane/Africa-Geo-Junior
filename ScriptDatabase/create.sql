/* Création de database */
CREATE DATABASE geojunior;
        /*Exécuter*/

/* crée les tableau utiliser (continent, pays, ville, Login)*/
    /*Table de continent*/
CREATE TABLE continent (
    id_continent INT AUTO_INCREMENT,
    nom VARCHAR(20),
    PRIMARY KEY (id_continent)
);

    /*Table de pays*/
CREATE TABLE pays (
    id_pays INT AUTO_INCREMENT,
    nom VARCHAR(20),
    population BIGINT,
    langues VARCHAR(20),
    id_continent INT,
    PRIMARY KEY (id_pays),
    FOREIGN KEY (id_continent) REFERENCES continent(id_continent)
);

    /*Table de ville*/
CREATE TABLE ville (
    id_ville INT AUTO_INCREMENT,
    nom VARCHAR(20),
    description TEXT,
    type ENUM('capitale' , 'autre'),
    id_pays INT,
    PRIMARY KEY (id_ville),
    FOREIGN KEY (id_pays) REFERENCES pays(id_pays)
    ON DELETE CASCADE
);

    /*Table de Login*/
CREATE TABLE Login (
    id_login INT AUTO_INCREMENT,
    email VARCHAR(50),
    password VARCHAR(20),
    PRIMARY KEY (id_login)
);

        /*Exécuter*/