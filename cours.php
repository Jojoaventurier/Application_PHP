<?php
/* 
    $_GET est une superglobale. 
Une superglobale n'a pas besoin d'être créee, elle est automatiquement chargée par le serveur PHP (ce sont des variables NATIVES de PHP). 
Les superglobales sont des variables accessibles partout, depuis n'importe quelle fonction classe ou fichier, sans rien avoir à faire de spécial.
Elles sont toutes de type tableau, proposant une manière simple d'y regrouper plusieurs informations sous forme de paires "clé/valeur". 

Le terme "superglobales" signifie que ces variables sont disponibles dans N'IMPORTE QUEL SCRIPT PHP.
(Elles ne contiennent pas nécéssairement d'information, si aucune donnée n'est transmises.)

    $_GET est conçue pour récupérer les paramètres de requête présents dans une URL
       -> http://monsite.com/liste.php?page=2  
       -->http:// -> le protocole employé pour a communication
       -->monsite.com -> le nom de domaine du serveur sur le réseau internet
       -->liste.php -> la ressource (fichier) demandé
       --> ?page = 2 est un paramètre de requête (Query String Parameter) "page" avc pour valeur = 2. Il s'agit de cet élément qu'on pourra récupérer avec la superglobale $_GET.
        Ce paramètre est référencé dans $_GET, fournie par le langage PHP et est spécialement conàure pour récupérer les paramètres de requête.

        $_GET -> liée à la méthode HTTP GET (contient tous les paramètres ayant été transmis au serveur par l'intermédiaire de l'URL de la requête -> Query String Parameters)

        $_POST -> liée à la méthode HTTP POST, contient toutes les données transmises au serveur par l'intermédaire d'un formulaire (Form Data ou Request Body Parameters).

        $_COOKIE -> contient les données stockées dans les cookies du navigateur client. 

        $_REQUEST -> regroupe les données transmises par les 3 superglobales $_GET, $_POST et $_COOKIE.

        $_SESSION -> contient les données stockées dans la session utilisateur côté serveur (si cette session a été démarée au préalable)

        $_FILES -> contient les informations associées à des fichiers uploadés par le client. Cette variable est soumise à plusieurs conditions :
            le client a soumis un formulaire dans lequel un champ <input type="file"> était présent (et rempli)
            ET
            que la balise <form> dudit formulaire comporte l'attribut enctype="multipart/form-data".

        $_ENV et $_SERVER, -> contiennent des informations relatives à l'environnement serveur (comme la version de l'OS, la version d'APACHE, de PHP, le chemin du dossier web, etc.)
            Par contre, elles ne sont pas concernées par la transmission d'information du client vers le serveur.


index.php -> présente le formulaire pour renseigner $nomProduit, $prixUnitaire, $quantiteSouhaitee
traitement.php -> traitera la requête provenant de la page index.php (après soumission du formulaire), ajoutera le produit avec nom, prix, quantité et le total (prix * quantité) calculé en sessions
recap.php -> affichera tous les produits en session (et en détail) et présentera la total général de tous les produits ajoutés.    


*/

var_dump($_GET);  //-> $_GET est un tableau contenant une clé "page" associée à la valeur "2". La valeur est de type "string" (même si c'est un nombre) puisque HTTP est un protocole de communication de texte (HyperTEXT Transfer Protocol)

// DEFINITION SESSION : Une session PHP correspond à une faàon de stocker des données différents pour chaque utilisateur en utilisant un identifiant de session unique. 

// DEFINITION FAILLE XSS : 