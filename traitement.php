<?php
    session_start();

    if(isset($_GET['action'])) {

        switch($_GET['action']) {
            case "add": 
                if(isset($_POST['submit'])){   //avec cette condition, on vérifie l'existence de la clé "submit" dans le tableau $_POST, cette clé correspond à l'attribut "name" du bouton <input type="submit" name="submit"> du formulaire  //La condition sera vraie seulement si la requête POST tranmet bien une clé "submit" au serveur. 
                     
                    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS); // FILER_SANITIZE_STRING (champ name) : ce filtre supprime une chaîne de caractères de toute présence de caractère spéciaux, et de toute balise HMTL potentielle ou les encode. Pas d'injection de code HTML possible !
                    $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION); // FILTER_VALIDATE_FLOAT (champ "price") : ne validera le prix que s'il est un nombre à fraction (pas de texte ou autre...), le drapeau FILTER_FLAG_ALLOW_FRACTION est ajouté pour permettre l'utilisation du caractère "," ou "." pour la décimale. 
                    $qtt = filter_input(INPUT_POST, 'qtt', FILTER_VALIDATE_INT); // FILTER_VALIDATE_INT (champ "qtt") : ne validera la quantité que si celle-ci est un nb entier différent de zéro (qui est considéré come null)
                                                         // filer_input() renvoie en cas de succès la valeur assainie correspondant au champ traité, false si le titre échoue ou null si le champs sollicité par le nettoyage    n'existait pas dans la requête POST. Ainsi, PAS DE RISQUES QUE L'UTILISATEUR TRANSMETTE DES CHAMPS SUPPLEMENTAIRES ! A la suite de cela, nous disposons de trois variables $name, $price et $qtt, censées contenir respectivement les valeurs nettoyées et/ou validées du formulaire.
                    if ($name && $price && $qtt) {              //Il faut maintenant vérifier si les filtres ont tous fonctionné grâce à une nouvelle condition : Sachant qu'un filtre renverra false ou null s'il échoue, et que nous ne pouvons pas ancitiper la saisie de l'utilisateru à ce niveau, il suffit de vérifier implicitement si chaque variable contient une valeur jugée positive par PHP (du texte, des nombres etc., autrement dit tout sauf false, null ou 0). Voilà pourquoi la condition ne compare les variables à rien de précis. 
            
                        $product = [  // $product comporte, comme stipulé dans le cahier des charges, une 4ème valeur "total", résultat de la multiplication du prix par la quantité du produit. Cette organisation des données nous permettra d'afficher nos produits plus tard de manière plus efficace et de rendre notre code plus explicite.  //Maintenant, il ne nous reste plus qu'à enregistrer ce produit en nouvellement créé en session. 
                            'name' => $name,
                            'price' => $price,
                            'qtt' => $qtt,
                            'total' => $price*$qtt
                        ];
            
                        $_SESSION["products"][] = $product; // cette ligne est efficace car : -> on sollicite le tableau de session $_SESSION fourni par PHP. -> on indique la clé "products" de ce tableau. Si cette clé n'existait pas auparavant (par exemple si l'utilisateur ajoute son tout premier produit), PHP la crééera au sein de $_SESSION. -> les deux crochets [] sont un raccourci pour indiquer à cet emplacement que nous ajoutons une nouvelle entrée au futur tableau "products" associé à cette clé. $_SESSION["products"] doit être lui aussi un tableau afin d'y stocker de nouveaux produits par la suite. (autre syntaxe pour $_SESSION['products'][] = $product est : array_push($_SESSION['products'], $product) mais PHP nous conseille dans sa documentation d'utiliser les [] pour éviter le passage d'une fonction (plus lourd en termes de performances)
                    }
                }break;

            case "clear":
                unset($_SESSION["products"]);
                break;
                
            case "remove":
                 foreach ($_SESSION['products'] as $index => $product){
                    if ($_GET['id'] == $index)
                    unset($_SESSION['products'][$index]);
                 }
            break;

            case "add":
                foreach ($_SESSION['products'] as $index => $product) {
                    if ($_GET['id'] == $index);
                    
                }
            break;
        }   
    }      

// header("Location:recap.php"); // dans l'autre cas, la ligne où est écrit header("Location:index.php"); va effectuer une redirection. Il n'y a pas de "else" à la condition car dans tous les cas (formulaire soumis ou non), nous ouhaitons revenir au formulaire après traitement // header("Location:...") est une fonction qui envoie un nouvel entête HTTP (les entêtes d'une réponse) au client. Avec le type d'appel "Location:", cette réponse est envoyée au client avec le code 302 qui indique une redirection. //-> le client recevra alors la ressource précisée dans cette fonction. Attention, l'utilisation de la fonction header() nécessite deux précautions. //-> ATTENTION : la page qui l'emploie NE DOIS PAS AVOIR EMIS UN DEBUT DE REPONSE AVANT header() (afficher du HTML par ex, appeler les fonctions echo() ou print(), ou au untre header()...) sour peine de perturber la réponse à émettre au client (mauvais entêtes HTTP...)//-> ATTENTION : l'appel de la fonction header() n'arrête pas l'exécution du script courant. Si le fichier effectue à la suite de la fonction d'autres traitements, il seront exécutés. Il faut alors veiller à ce que header() soit la dernière instruction du fichier ou appeler la fonction exit() (ou die()) tout de suite après. De même, une fonction header() appelée succesivement à une autre écrasera les entêtes de la première...//-> si on essaye d'accéder à traitement.php sans passer par la validation du  formulaire (en saisissant directement son URL dans la barre d'adresse du navigateur)... Nous sommes envoyés sur index.php quoi qu'il arrive. 


?> 

<nav class="grey">
<a class="uk-link-heading" href=index.php>Accueil</a>
<span class="uk-text-primary">|</span>
<a class="uk-link-heading" href=recap.php>Récapitulatif</a>     
</nav>
   
   