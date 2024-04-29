<?php                   // recap.php devra nous permettre d'afficher de manière organisée et exhaustive la liste des produits présents en session. Elle doit également présenter le total de l'ensemble de ceux-ci.
    session_start();    // A la différence d'index.php, nous aurons besoin ici de parcourir le tableau de session, il est donc nécéssaire d'appeler la fonction session_start() en début de fichier afin de récupérer la session correspondante à l'utilisateur.   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.20.4/css/uikit-core-rtl.min.css" integrity="sha512-/KGfVFsbk9a7nzjCYF0dSMc+H58wKeODeZVyPaR20TlLVtoQVitubbROxToRODDiBW4EbBSAA//yAt1N+xgVtg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">

    <title>Récapitulatif des produits</title>
</head>
<body>

    <nav class="grey">
        <a class="uk-link-heading" href=index.php>Accueil</a>
        <a class="uk-link-heading" href=recap.php>Récapitulatif</a>      
    </nav>

    <div class= "grey"> 
        <?php echo "Nombre de produits ajoutés : ".count($_SESSION['products'])."<br>"; ?>
    </div>
   <?php 
        if(!isset($_SESSION['products']) || empty($_SESSION['products'])) {  // - La fonction isset() vérifie l'existence d'une variable peu importe si elle est vide ou pas. - La fonction ! empty() vérifie si une variable n'est pas vide peu importe si elle existe ou pas.
            echo "<p>Aucun produit en session...</p>"; // -> Soit la clé "products" du tableau de session $_SESSION n'existe pas : !isset() -> Soit cette clé existe mais ne contient aucune donnée : empty(). Dans ces ceux cas, nous afficherons à l'utilisateur un message le prévenant qu'aucun produit n'existe en session. Il ne nous reste plus qu'à afficher le contenu de $_SESSION dans la partie else de notre condition.
        }
        else {
            echo "<table>",
                    "<head>",
                        "<tr>",
                            "<th>#</th>",               //Sur les lignes 17 à 28, on trouve les balises HTML initialisant correctement un tableau HTML avec une ligne d'en-têtes <thead>, afin de bien décomposer les données de chaque produit.
                            "<th>Nom</th>",
                            "<th>Prix</th>",
                            "<th>Quantité</th>",
                            "<th>Total</th>",
                        "</tr>",
                    "</thead>",
                    "<tbody>";
            $totalGeneral = 0;
            foreach($_SESSION['products'] as $index => $product) {                                           // Ligne 30, on observe la boucle itérative foreach() de PHP, particulièrement efficace pour éxectuer, produit par produit, les mêmes instructions qui vont permettre l'affichage uniforme de chacun d'entre eux. Pour chaque donnée dans $_SESSION['products'], nous disposeront au sein de la boucle de deux variables : $index = aura pour valeur l'index du tableau $_SESSION['products'] parcouru. Nous pourrons numéroter ainsi chaque produit avec ce numéro dans le tableau HTML (en première colonne), et $product = cette variable contiendra le produit, sous forme de tableau, tel que l'a créé et stocké en session le fichier traitement.php 
                echo "<tr>",
                         "<td>".$index."</td>",
                        "<td>".$product['name']."</td>",                                                 // la boucle créera alors une ligne <tr> et toutes les cellules <td> nécessaires à chaque partie du produit à afficher, et ce pour chaque produit présent en session. 
                        "<td>".number_format($product['price'], 2, ",", "&nbsp;"). "&nbsp;€</td>",  
                        "<td>".$product['qtt']."</td>",                                                     // La fonction number_format() permet de modifier l'affichage d'une valeur numérique en précisant plusieurs paramètres : number_format(variable à modifier, nb de décimales souhaité, caractère séparateur décimal, caractère séârateur de milliers); 
                        "<td>".number_format($product['total'], 2, ",", "&nbsp")."&nbsp;€</td>",               // en ajoutant le symbole €,  avant la fermeture le la balise <td>, le prix s'affichera avec € derrière
                    "</tr>";
                $totalGeneral += $product['total'];
            } 
            echo "<tr>",
                    "<td colspan=4>Total général : </td>",
                    "<td><strong>".number_format($totalGeneral, 2, ",", "&nbsp;")."&nbsp;€</strong></td>",
                "</tr>",
            "</tbody>",
            "</table>";
        }
   
     //var_dump($_SESSION['products']);   
   ?> 
   <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.20.4/js/uikit.min.js" integrity="sha512-qlI3geWkDYoFqY+xf/1GTxLOYw5c2Fp0w7+bPTrkwEJD7+NWDTWOKNFA48kDY/uC5AU9jFAt6VlueKFDVjYjHw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.20.7/dist/js/uikit-icons.min.js"></script>
</body>
</html>