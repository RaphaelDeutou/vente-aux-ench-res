# Vente aux enchères

Application web en PHP pour une plateforme de vente aux enchères de véhicules : inscription/connexion des utilisateurs, ajout et consultation des véhicules mis en vente.

## Contenu

- `register.php` / `login.php` — inscription et connexion
- `ajout_vehicule.php` — ajout d'un véhicule à la vente
- `liste_vehicule.php` — consultation des véhicules disponibles
- `acces_bd.php` — connexion à la base MySQL

## Lancer en local

1. Créer une base MySQL nommée `login` (le schéma n'est pas versionné dans ce dépôt)
2. Démarrer un serveur PHP (Apache/XAMPP) avec `index.php` comme point d'entrée
3. Adapter les identifiants de connexion dans `acces_bd.php` si besoin (par défaut : `root` sans mot de passe, en local)

## Statut

Projet d'apprentissage en PHP/MySQL.
