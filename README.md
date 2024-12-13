# Africa Géo-Junior

**Africa Géo-Junior** est une application web éducative visant à enrichir les connaissances géographiques des élèves sur le continent africain. Ce projet est destiné à offrir un outil interactif permettant aux élèves d'apprendre et de tester leurs connaissances sur les pays, les capitales, et les villes importantes d'Afrique. L'application se concentre sur l'interaction avec une base de données structurée, respectant les principes fondamentaux de SQL et des systèmes de gestion de bases de données (SGBD).

## Objectif du projet

Concevoir un site web interactif pour aider les élèves à apprendre la géographie de l'Afrique. Les fonctionnalités incluent l'ajout, la modification, la suppression, et l'affichage des informations sur les pays et leurs villes importantes.

### Fonctionnalités principales :

- **Ajout d'un pays africain** avec ses villes clés, population, et langues officielles.
- **Modification ou suppression** des informations d'un pays existant.
- **Affichage des pays du continent africain** avec leurs détails.

## Technologies utilisées

- **Backend** : PHP
- **Base de données** : MySQL
- **Frontend** : HTML, CSS, JavaScript (pour l'interactivité)
- **SGBD** : MySQL (ou tout autre SGBD relationnel compatible)

## Structure de la base de données

La base de données comprend deux entités principales : `Pays` et `Villes`.

### 1. Entité `Pays`
- **ID** : Identifiant unique du pays (Clé primaire)
- **Nom** : Nom du pays
- **Population** : Nombre d'habitants
- **Langue(s) officielle(s)** : Langue(s) officielle(s) parlée(s)
- **Continent** : Continent auquel appartient le pays (dans ce cas, toujours "Afrique")

### 2. Entité `Villes`
- **ID** : Identifiant unique de la ville (Clé primaire)
- **Nom** : Nom de la ville
- **Description** : Description de la ville (peut inclure des informations comme son rôle, son histoire, etc.)
- **Type** : Type de la ville (par exemple, capitale, ville importante, etc.)

### Relations
- Un pays peut avoir plusieurs villes associées.
- Chaque ville appartient à un pays spécifique.

## Diagramme Relationnel (ERD)

- **Pays (ID, Nom, Population, Langue(s), Continent)**
- **Villes (ID, Nom, Description, Type, Pays_ID)** (Pays_ID étant une clé étrangère pointant vers `Pays`)

# Livrables

1. **Modélisation 1er jour** :
   - Création d’un diagramme clair et cohérent des cas d’utilisation.

2. **Scripts SQL 3ème jour** :
   - Scripts pour créer et manipuler la base de données.
   - Modélisation d’une base de données logique et bien normalisée (ERD).

3. **Code PHP 5ème jour** :
   - Implémentation fonctionnelle des actions CRUD pour les pays et leurs villes.
   - Affichage dynamique des données à partir de la base de données.
   - Respect des bonnes pratiques de développement et de sécurité.