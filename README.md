Projet 3 WCS 'les2mains'
========================

A Symfony 3.2 project created on April 27, 2017, 2:14 pm.

Site présentant la Permaculture de Léo et Clément.

Les Fonctions de ce site :

- Traitement de la Partie Admin, directement dans les Vues (ajout, suppression, modifications) pour une grande facilité d'utilisation et rapididité d'exécution.

- Présentation de la Permaculture, de Léo et Clément et de l'association 'les 2mains'.

- Partie Actualités pour suivre les dernière News.

- Partie Activités Stages/Cours : Présentation des activités disponible chez Léo et Clément, ainsi que les stages/cours qui y sont ratachés.

- Partie Produits : Présentation des produits du jardin et de la boulangerie de Léo et Clément, ainsi que d'une partie réservation en ligne, pour les clients, des différents produits mis en vente. (Selon les jours et lieux de vente).

- Page Contact

#### Pré-requis: 
composer ==> [Install Composer](https://getcomposer.org/doc/00-intro.md)

#### Initialisation du projet
1. **Avec ssh**: git clone git@github.com:WildCodeSchool/bleau_S3_2017_les2mains
2. **Sans ssh**: git clone https://github.com/WildCodeSchool/bleau_S3_2017_les2mains
3. cd bleau_S3_2017_les2mains
4. composer install
5. php bin/console doctrine:database:create
6. php bin/console doctrine:schema:update --force
7. mkdir web/uploads/images
8. chmod -R 777 web/uploads/images
9. Setting up or Fixing File Permissions ==> https://symfony.com/doc/current/setup/file_permissions.html
10. php bin/console doctrine:fixtures:load

# Develop by: 
 - Cynthia Couchot => https://github.com/KyoLuma
 - Cecile Berger => https://github.com/coco-b
 - Sebastien Loboda => https://github.com/SebiLob
 - Jérémy Lemarinier => https://github.com/JIM2022
