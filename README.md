# Plateforme de vente

### Auteurs 

Sandrine EAR


### Fonctionnalités

Pour les vendeurs :
- Produits : liste par catégorie ou recherche, enregistrement, modification et suppression.
- Commandes : affichage des demandes, acceptation ou refus.

Pour les acheteurs :
- Produits : Liste de tous les produits, liste par fournisseur et/ou catégorie et/ou recherche.
- Commander un produit.
- Liste des commandes (en cours, acceptées, refusées).


##### Un vendeur ne peut pas être un acheteur et inversement.


### Base de données

La base de données utilisé est : 
- users (uid,nom,prenom,login,mdp,role)
- produits (pid,nom,description,qte,prix,uid,ctid)
- categories(ctid,nom)
- commande(cmdid,pid,uid,qte,date,statut)