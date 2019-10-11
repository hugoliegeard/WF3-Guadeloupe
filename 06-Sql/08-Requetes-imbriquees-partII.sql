# Afficher les livres qui n'ont pas été rendus à la bibliothèque ?
# On recherche les livres ayant une date_rendu NULL.
# /!\ IS NULL et non pas = NULL /!\
SELECT id_livre FROM emprunt WHERE date_rendu IS NULL;

# Trouver les titres des livres n'ayant pas été rendus...
SELECT titre FROM livre 
	WHERE id_livre IN ( 
		SELECT id_livre FROM emprunt WHERE date_rendu IS NULL ) ;
        
# Récupérer les ID des livres emprunté par Chloé ?
SELECT id_livre FROM emprunt WHERE id_abonne = ( 
	SELECT id_abonne FROM abonne WHERE prenom = 'Chloe' ) ;

# Afficher les prénoms des abonnés ayant emprunté un livre le 19/12/2014
SELECT 	prenom FROM abonne
	WHERE id_abonne IN (
		SELECT id_abonne FROM emprunt WHERE date_sortie =  '2014-12-19') ;

# Afficher la liste des abonnés ayant déjà emprunté un livre d'Alphonse DAUDET ?
SELECT prenom FROM abonne 
	WHERE id_abonne 
		IN ( SELECT id_abonne FROM emprunt WHERE id_livre 
			IN ( SELECT id_livre FROM livre WHERE auteur = 'ALPHONSE DAUDET' )  ) ;

# Afficher le(s) titre de(s) livre(s) que Chloé n'a pas encore emprunté à la bibliothèque ?
SELECT titre FROM livre
	WHERE id_livre 
		NOT IN ( SELECT id_livre FROM emprunt WHERE id_abonne 
			IN ( SELECT id_abonne FROM abonne WHERE prenom = 'chloe' ) ) ;

# Afficher le(s) titre de(s) livre(s) que Chloé n'a pas encore rendu(s) à la bibliothèque.
SELECT titre FROM livre WHERE id_livre IN
	( SELECT id_livre FROM emprunt WHERE date_rendu IS NULL 
		AND id_abonne = ( SELECT id_abonne FROM abonne WHERE prenom = 'chloe' ) ) ;

# Combien de livre Guillaume a emprunté à la bibliotheque ?
SELECT COUNT(*) AS 'nb_livre' FROM emprunt
	WHERE id_abonne = ( 
		SELECT id_abonne FROM abonne WHERE prenom = 'guillaume'
    ) ;




