<?php                   // recap.php devra nous permettre d'afficher de manière organisée et exhaustive la liste des produits présents en session. Elle doit également présenter le total de l'ensemble de ceux-ci.
    session_start();    // A la différence d'index.php, nous aurons besoin ici de parcourir le tableau de session, il est donc nécéssaire d'appeler la fonction session_start() en début de fichier afin de récupérer la session correspondante à l'utilisateur.   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Récapitulatif des produits</title>
</head>
<body>
   <?php var_dump($_SESSION); ?> 
</body>
</html>