Exercice guidé de formation. Il s'agit de créer pas-à-pas une petite application web dont le cahier des charges est celui-ci:

  L'application doit permettre à un utilisateur de renseigner différents produits par le biais d'un formulaire, produits qui seront consultables sur une page récapitulative.
  L'enregistrement en session de chaque produit est nécessaire. L'application ne nécessite pour l'instant aucun rendu visuel spécifique.
      Trois pages sont nécessaires à cela :
      
      1. index.php

      Présentera un formulaire permettant de renseigner :

        - le nom du produit
        - son prix unitaire
        - la quantité désirée

      2. traitement.php

      Traitera la requête provenant de la page index.php (après soumission du formulaire), ajoutera le produit avec son nom, son prix, sa quantité et le total calculé (prix x quantité) en session.
      Il faudra :
        - Démarrer une session
        - Vérifier l'existence d'une requête POST
        - Filtrer les valeurs transmises
        - Enregistrer un produit en session

      3. recap.php

      Affichera tous ls produits en session (et en détail) et présentera le total général de tous les produits ajoutés. 
        - Tests pour vérifier que le tableau de session contienne bien des informations à afficher
        - Vérifications que les filtres mis en places fonctionnent
        - Affichage dynamique des produits
        - Calcul et affichage du total général
      
