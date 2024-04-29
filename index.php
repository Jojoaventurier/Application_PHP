<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.20.4/css/uikit-core-rtl.min.css" integrity="sha512-/KGfVFsbk9a7nzjCYF0dSMc+H58wKeODeZVyPaR20TlLVtoQVitubbROxToRODDiBW4EbBSAA//yAt1N+xgVtg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="style.css">
       

        <title>Ajout produit</title>
    </head>
    <body>

        <nav class="grey">
            <a class="uk-link-heading" href=index.php>Accueil</a>
            <span class="uk-text-primary">|</span>
            <a class="uk-link-heading" href=recap.php>Récapitulatif</a>     
        </nav>

        <div class= "grey"> 
            <?php 
                if (!isset($_SESSION['products'])) {
                    echo "Aucun produit ajouté pour le moment<br>";
            } else {
                    $result = 0;
                foreach ($_SESSION['products'] as $index => $product) {
                    
                    $result += $_SESSION['products'][$index]['qtt'];
                }
                echo "Nombre de produits ajoutés : <span class='uk-text-primary'>".$result."</span><br>"; 
            }
            ?>  
        </div>
        
        <section id ="wrapper" > 
            
            <div id="appBox" class="uk-card uk-card-body">
            
                <h2 id="titre" class="uk-card-title">Ajouter un <span class='uk-text-primary'>produit</span></h2>

                <form action="traitement.php?action=add" method="post">  <!--attribut action : indique la cible du formulaire, le fichier à atteindre lorsque l'utilisateur soumettra le formulaire -->                                               
                    <p>                                       <!--attribut method : précise par quelle méthode HTTP les données du formulaire sont transmises au serveur -->
                        <label>                               <!--La méthode employée ici est POST, pour ne pas "polluer" l'URL avec les données du formulaire (il est néanmoins possible de soumettre un formulaire avec la méthode GET(utilisée par défaut si aucune méthode n'est précisée), les données renseignées dans les champs du formulaire seraient par conséquent inscrites dans l'URL et limitées en nombre de caractères selon le navigateur ou le serveur) -->
                            Nom du produit :                  <!--(exemple d'URL obtenue en validant ce formulaire avec l'attribut methode="get") http://localhost/appli/traitement.php?name=Pomme&price=2.5&qtt=2-->
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
                            <input type="number" name="qtt" step="qtt" value="1">
                        </label>
                    </p>
                    <p>
                        <input class="uk-button uk-button-primary uk-button-small" type="submit" name="submit" value="Ajouter le produit"> <!--Le champ <input type="submit">, représentant le bouton de soumission de formulaire, contient lui aussi un attribut "name". Ce choix permettra de vérifier côté serveur que le formulaire a bien été validé par l'utilisateur.--> 
                    </p>
                </form>

            </div>

            <a href="traitement.php?action=clear" class="uk-button uk-button-primary uk-button-small">CLEAR</a>


            <?php

            if (isset($_SESSION['flash_message'])) {

                $message = $_SESSION['flash_message'];
                unset($_SESSION['flash_message']);
                echo $message;
            }  

            //var_dump($_SESSION['products']);
            ?>

        </section>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.20.4/js/uikit.min.js" integrity="sha512-qlI3geWkDYoFqY+xf/1GTxLOYw5c2Fp0w7+bPTrkwEJD7+NWDTWOKNFA48kDY/uC5AU9jFAt6VlueKFDVjYjHw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.20.7/dist/js/uikit-icons.min.js"></script>
    </body>
</html>



<?php


