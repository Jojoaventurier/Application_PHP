

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Ajout produit</title>
    </head>
    <body>
    
        <h1>Ajouter un produit</h1>
        <form action="traitement.php" method="post">  <!--attribut action : indique la cible du formulaire, le fichier à atteindre lorsque l'utilisateur soumettra le formulaire -->                                               
            <p>                                       <!--attribut method : précise par quelle méthode HTTP les données du formulaire sont transmises au serveur -->
                <label>                               <!--La méthode employée ici est POST, pour ne pas "polluer" l'URL avec les données du formulaire (il est néanmoins possible de soumettre un formulaire avec la méthode GET(utilisée par défaut si aucune méthode n'est précisée), les données renseignées dans les champs du formulaire seraient par conséquent inscrites dans l'URL et limitées en nombre de caractères selon le navigateur ou le serveur) -->
                    Nom du produit :                        <!--(exemple d'URL obtenue en validant ce formulaire avec l'attribut methode="get") http://localhost/appli/traitement.php?name=Pomme&price=2.5&qtt=2-->
                    <input type="text" name="name">   
                </label>
            </p>
            <p>
                <label>
                    Prix du produit :
                    <input type="number" step="any" name="price"> <!--chaque input dispose d'un attribut "name", ce qui va permettre à la requête de classer le contenu de la saisie dans des clés portant le nom choisi-->
                </label>                                           <!--Avec $_POST, après saisie et soumission du formulaire, les données sont structurées dans le tableau $_POST de la même manière que $_GET, sans être visibles dans l'URL-->
            </p>
            <p>
                <label>
                    Quantité désirée :
                    <input type="number" step="qtt" value="1">
                </label>
            </p>
            <p>
                <input type="submit" name="submit" value="Ajouter le produit"> <!--Le champ <inpu type="submit">, représentant le bouton de soumission de formulaire, contient lui aussi un attribut "name". Ce choix permettra de vérifier côté serveur que le formulaire a bien été validé par l'utilisateur.--> 
            </p>
        </form>    

    </body>
</html>



<?php

